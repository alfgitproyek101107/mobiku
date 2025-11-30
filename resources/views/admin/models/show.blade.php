@extends('admin.layouts.app')

@section('title', 'View Model: ' . $model->name)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900 p-6">
    <div class="mb-8">
        <h1 class="text-3xl font-light text-white mb-2">View Model: {{ $model->name }}</h1>
        <p class="text-gray-400">Detailed information about this car model.</p>
    </div>

    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-light text-white">Model Details</h3>
            <div class="flex space-x-4">
                <a href="{{ route('admin.models.edit', $model->id) }}" class="bg-gradient-to-r from-amber-500 to-orange-600 text-white px-4 py-2 rounded-xl font-light hover:shadow-lg hover:shadow-amber-500/20 transition-all duration-300">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <a href="{{ route('admin.models.index') }}" class="bg-gray-700/50 text-white px-4 py-2 rounded-xl font-light hover:bg-gray-600/50 transition-all duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>Back to List
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div>
                <h4 class="text-lg font-light text-amber-400 mb-4">Basic Information</h4>
                <div class="space-y-4">
                    <div class="flex justify-between border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Name:</span>
                        <span class="text-white">{{ $model->name }}</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Slug:</span>
                        <span class="text-white">{{ $model->slug }}</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Price:</span>
                        <span class="text-white">Rp {{ number_format($model->price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Category:</span>
                        <span class="text-white">{{ ucfirst($model->category) }}</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Status:</span>
                        <span class="text-white">{{ ucfirst($model->status) }}</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Created At:</span>
                        <span class="text-white">{{ $model->created_at->format('d M Y H:i') }}</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Updated At:</span>
                        <span class="text-white">{{ $model->updated_at->format('d M Y H:i') }}</span>
                    </div>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-light text-amber-400 mb-4">Specifications</h4>
                <div class="space-y-4">
                    <div class="flex justify-between border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Engine:</span>
                        <span class="text-white">{{ $model->specifications['engine'] ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Horsepower:</span>
                        <span class="text-white">{{ $model->specifications['horsepower'] ?? '-' }} HP</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Transmission:</span>
                        <span class="text-white">{{ $model->specifications['transmission'] ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Fuel Type:</span>
                        <span class="text-white">{{ $model->specifications['fuel_type'] ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Seats:</span>
                        <span class="text-white">{{ $model->specifications['seats'] ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 pb-2">
                        <span class="text-gray-400">Drivetrain:</span>
                        <span class="text-white">{{ $model->specifications['drivetrain'] ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-8">
            <h4 class="text-lg font-light text-amber-400 mb-4">Description</h4>
            <div class="prose prose-invert max-w-none">
                <p class="text-gray-300 whitespace-pre-line">{{ $model->description ?? 'No description available.' }}</p>
            </div>
        </div>

        <div class="mb-8">
            <h4 class="text-lg font-light text-amber-400 mb-4">Badge</h4>
            <div>
                <span class="px-4 py-2 bg-gradient-to-r {{ $model->badge_color ?? 'from-amber-500 to-orange-600' }} text-white text-sm font-bold rounded-full shadow-lg">
                    {{ $model->badge_text ?? 'NO BADGE' }}
                </span>
            </div>
        </div>

        <div class="mb-8">
            <h4 class="text-lg font-light text-amber-400 mb-4">Images</h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @if($model->image)
                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-48 flex items-center justify-center text-gray-500">
                        <img src="{{ asset('images/models/' . $model->image) }}" alt="{{ $model->name }}" class="w-full h-full object-cover rounded-xl">
                    </div>
                @else
                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-48 flex items-center justify-center text-gray-500">
                        No Main Image
                    </div>
                @endif

                @if($model->additional_images && count($model->additional_images) > 0)
                    @foreach($model->additional_images as $image)
                        <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-48 flex items-center justify-center text-gray-500">
                            <img src="{{ asset('images/models/' . $image) }}" alt="{{ $model->name }} - Additional" class="w-full h-full object-cover rounded-xl">
                        </div>
                    @endforeach
                @else
                    <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-48 flex items-center justify-center text-gray-500 col-span-2">
                        No Additional Images
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection