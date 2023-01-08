<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{
    //protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make('Last Purchase', 'id')
            ->format(
                fn ($value, $row, Column $column) =>  $row->latestPurchase->created_at
            ),
        ];
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        return User::query()->with('latestPurchase');
    }
}
