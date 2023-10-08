<?php

namespace App\Traits\Forms;

use App\Models\RouterConfig;
use Carbon\CarbonPeriod;
use Filament\Forms\Components\{Repeater, Section, Select, TagsInput, TextInput, TimePicker};
use Filament\Forms\{Form, Get, Set};
use Illuminate\Support\{Carbon};
use Livewire\Attributes\Computed;

trait WithRouterConfigForm
{
    public $routerConfigId;

    #[Computed]
    public function routerConfig()
    {
        return RouterConfig::find($this->routerConfigId);
    }

    public function routerConfigForm(Form $form)
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('name')
                        ->validationAttribute('Name')
                        ->required()
                        ->string()
                        ->unique(RouterConfig::class, 'name', fn () => $this->routerConfig)
                        ->rules(['max:255'])
                        ->columnSpan(2)
                        ->autofocus(),
                ])
                    ->columnSpan(2)
                    ->columns(2),
                $this->routerConfigRuleRepeater('data_limit', 'Data Limit'),
                $this->routerConfigRuleRepeater('download_speed_limit', 'Download Speed Limit'),
                $this->routerConfigRuleRepeater('upload_speed_limit', 'Upload Speed Limit'),
                $this->routerConfigRuleRepeater('disable_access', 'Disable Access'),
                Section::make()->schema([
                    TagsInput::make('sites_allowed')
                        ->label('Sites Allowed')
                        ->validationAttribute('Sites Allowed')
                        ->placeholder('')
                        ->splitKeys(['Enter'])
                        ->columnSpan(2),
                    TagsInput::make('sites_denied')
                        ->label('Sites Denied')
                        ->validationAttribute('Sites Denied')
                        ->prohibited(function (Get $get) {
                            return count($get('sites_allowed'));
                        })
                        ->placeholder('')
                        ->splitKeys(['Enter'])
                        ->columnSpan(2),
                ])
                    ->columnSpan(2)
                    ->columns(2),
            ])->statePath('input');
    }

    protected function routerConfigRuleRepeater($name, $label)
    {
        return Repeater::make($name)
            ->label($label)
            ->schema([
                TextInput::make('value')
                    ->validationAttribute('Value')
                    ->requiredIf(function (Get $get) use ($name) {
                        return 'disable_access' != $name || 'n/a' != $get('unit');
                    }, null)
                    ->rules(['nullable', 'integer', 'min:0', 'max:999999'])
                    ->label('Value (Mbps)')
                    ->hidden(function () use ($name) {
                        return 'disable_access' == $name;
                    }),
                Select::make('unit')
                    ->validationAttribute('Unit')
                    ->required()
                    ->in(array_keys(config('services.duration_units')))
                    ->rules([
                        fn (Get $get): \Closure => function ($attribute, $value, $fail) use ($get, $name) {
                            if ('day' == $value) {
                                return;
                            }

                            if (
                                collect($get("../../{$name}"))
                                    ->where('unit', '=', $value)
                                    ->count() > 1
                            ) {
                                $fail('The :attribute field has duplicate value');
                            }
                        },
                    ])
                    ->options(config('services.duration_units'))
                    ->live(false, 250)
                    ->afterStateUpdated(function (Set $set) {
                        $set('from', null);
                        $set('to', null);
                        $set('options', null);
                    }),
                TimePicker::make('from')
                    ->validationAttribute('From')
                    ->requiredIf('unit', 'day')
                    ->prohibited(function (Get $get) {
                        return 'day' != $get('unit');
                    })
                    ->rules(['date_format:H:i'])
                    ->seconds(false)
                    ->hidden(function (Get $get) {
                        return 'day' != $get('unit');
                    }),
                TimePicker::make('to')
                    ->validationAttribute('To')
                    ->requiredIf('unit', 'day')
                    ->prohibited(function (Get $get) {
                        return 'day' != $get('unit');
                    })
                    ->after('from')
                    ->rules([
                        'bail',
                        'date_format:H:i',
                        fn (Get $get): \Closure => function ($attribute, $value, $fail) use ($get, $name) {
                            $period = null;

                            $rules = collect($get("../..{$name}"))
                                ->where('unit', '=', 'day')
                                ->values()->all();

                            foreach ($rules as $index => $rule) {
                                if (! $index) {
                                    $period = CarbonPeriod::create($rule['from'], $rule['to']);

                                    continue;
                                }

                                $from = Carbon::parse($rule['from']);

                                $to = Carbon::parse($rule['to']);

                                if ($period->overlaps($from, $to)) {
                                    $fail('The :attribute field has overlaping duration.');

                                    return;
                                }
                                $period = CarbonPeriod::create($rule['from'], $rule['to']);
                            }
                        },
                    ])
                    ->seconds(false)
                    ->hidden(function (Get $get) {
                        return 'day' != $get('unit');
                    }),
                Select::make('options')
                    ->validationAttribute('Days')
                    ->label('Days')
                    ->requiredIf('unit', 'week')
                    ->prohibited(function (Get $get) {
                        return 'week' != $get('unit');
                    })
                    ->options(weekDays())
                    ->multiple()
                    ->hidden(function (Get $get) {
                        return 'week' != $get('unit');
                    })->columnSpan(2),
            ])
            ->columnSpan(2)
            ->columns(4)
            ->addActionLabel("Add Another {$label} Rule")
            ->reorderable(false)
            ->deletable(function ($state) {
                return count($state ?? []) > 1;
            })->minItems(1);
    }
}
