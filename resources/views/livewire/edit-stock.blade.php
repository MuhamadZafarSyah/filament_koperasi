use App\Http\Livewire\EditStock;

TextColumn::make('stock')
->sortable()
->editable()
->editOnClick()
->editAction(EditStock::class),
