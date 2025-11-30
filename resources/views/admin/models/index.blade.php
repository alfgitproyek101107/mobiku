@extends('admin.layouts.app')

@section('title', 'Models')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-gray-900 to-slate-900 p-6">
    <!-- Alert Messages -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-900/30 border border-green-700/50 text-green-400 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-8">
        <h1 class="text-3xl font-light text-white mb-2">Models</h1>
        <p class="text-gray-400">Manage all car models in your inventory.</p>
    </div>

    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-gray-700/50">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-light text-white">All Models</h3>
            <a href="{{ route('admin.models.create') }}" class="bg-gradient-to-r from-amber-500 to-orange-600 text-white px-4 py-2 rounded-xl font-light hover:shadow-lg hover:shadow-amber-500/20 transition-all duration-300">
                <i class="fas fa-plus mr-2"></i>Add New Model
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-gray-300">
                <thead>
                    <tr class="border-b border-gray-700">
                        <th class="py-3 px-4 text-left">Name</th>
                        <th class="py-3 px-4 text-left">Price</th>
                        <th class="py-3 px-4 text-left">Category</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($models as $model)
                    <tr class="border-b border-gray-700/50 hover:bg-gray-700/30 transition-colors">
                        <td class="py-3 px-4">{{ $model->name }}</td>
                        <td class="py-3 px-4">Rp {{ number_format($model->price, 0, ',', '.') }}</td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs rounded-full">
                                {{ ucfirst($model->category) }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <span class="px-2 py-1 bg-{{ $model->status === 'active' ? 'green' : 'red' }}-500/10 border border-{{ $model->status === 'active' ? 'green' : 'red' }}-500/20 text-{{ $model->status === 'active' ? 'green' : 'red' }}-400 text-xs rounded-full">
                                {{ ucfirst($model->status) }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.models.edit', $model->id) }}" class="text-amber-400 hover:text-amber-300" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.models.show', $model->id) }}" class="text-blue-400 hover:text-blue-300" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.models.destroy', $model->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this model? This action cannot be undone.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-8 text-center text-gray-400">
                            <i class="fas fa-car text-4xl mb-4"></i>
                            <p>No models found.</p>
                            <p class="text-sm mt-2">Add your first model using the "Add New Model" button.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $models->links() }}
        </div>
    </div>
</div>
@endsection