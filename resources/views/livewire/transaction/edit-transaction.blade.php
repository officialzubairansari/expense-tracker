<div class="row">

    <x-layouts.breadcrumb />

    <div class="col-md-12">
        <!-- Account details card-->
        <div class="card border-0 shadow components-section">
            <div class="card-header bg-gray-800 text-white p-3">
                <span class="h4">Edit Expense</span>
            </div>
            <div class="card-body">
                <form wire:submit="update">
                    <div class="row gx-3 mb-3">
                        <div class="col-md-4">
                            <label class="small mb-1" for="date">Date</label>
                            <input class="form-control" wire:model="form.date" type="date" id="date">
                            @error('form.date') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-4" wire:ignore>
                            <label class="small mb-1" for="category_id">
                                Category
                                <span class="badge badge-pill bg-success my-0" id="type"></span>
                            </label>
                            <select class="form-control select2" wire:model="form.category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" wire:key="{{ $category->id }}" data-type="{{ $category->type }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('form.category_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="small mb-1" for="amount">Amount</label>
                            <input class="form-control" wire:model="form.amount" type="number" id="amount">
                            @error('form.amount') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="small mb-1" for="description">Description</label>
                            <textarea class="form-control" wire:model="form.description" id="description"></textarea>
                            @error('form.description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: "bootstrap-5"
            });

            $('#type').text($(this).find(':selected').data('type'))

            $('#category_id').change(function (){
                Livewire.first().form.category_id = $(this).val()
                $('#type').text($(this).find(':selected').data('type'))
            })
        })
    </script>
@endpush
