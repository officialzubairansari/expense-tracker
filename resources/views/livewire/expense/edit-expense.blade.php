<div class="row">
    <div class="col-md-12">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Edit Expense</div>
            <div class="card-body">
                <form wire:submit="update">
                    <div class="row gx-3 mb-3">
                        <div class="col-md-4">
                            <label class="small mb-1" for="date">Date</label>
                            <input class="form-control" wire:model="form.date" type="date" id="date">
                            @error('form.date') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="small mb-1" for="category_id">Category</label>
                            <select class="form-control" wire:model="form.category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
