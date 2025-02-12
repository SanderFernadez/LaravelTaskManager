<section>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-700 mb-6">Lista de Tareas</h1>

        <div class="overflow-x-auto bg-white rounded-lg">
            <div class="flex justify-end mb-4">
                <button class="bg-green-500 text-white px-4 py-2 rounded-md text-sm mb-4 mr-4 mt-4" wire:click = "OpenCreateModal">Agregar</button>
            </div>
            <table class="min-w-full border border-gray-100">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="py-4 px-6 text-left text-sm font-medium text-gray-500 uppercase">ID</th>
                        <th class="py-4 px-6 text-left text-sm font-medium text-gray-500 uppercase">Título</th>
                        <th class="py-4 px-6 text-left text-sm font-medium text-gray-500 uppercase">Descripción</th>
                        <th class="py-4 px-6 text-left text-sm font-medium text-gray-500 uppercase">Fecha de Creación</th>
                        <th class="py-4 px-6 text-center text-sm font-medium text-gray-500 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($tasks as $task)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-4 px-6 text-sm text-gray-700">{{ $task->id }}</td>
                            <td class="py-4 px-6 text-sm text-gray-700">{{ $task->title }}</td>
                            <td class="py-4 px-6 text-sm text-gray-700">{{ $task->description }}</td>
                            <td class="py-4 px-6 text-sm text-gray-700">{{ $task->created_at }}</td>
                            <td class="py-4 px-6 text-center">
                                <a href="#" class="bg-blue-100 text-blue-600 px-3 py-1 rounded-md text-sm mr-2 cursor-not-allowed opacity-50">
                                    Editar
                                </a>
                                <button class="bg-red-100 text-red-600 px-3 py-1 rounded-md text-sm cursor-not-allowed opacity-50">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     </div>

        
  
    

<!-- Modal de Livewire -->
@if($modal)
    <div class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50">
        <div class="relative p-4 w-full max-w-md bg-white rounded-lg shadow-lg">
            <!-- Header del modal -->
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-lg font-semibold text-gray-900">
                    Crear Nueva Tarea
                </h3>
                <button type="button" wire:click="closeCreateModal" class="text-gray-400 hover:text-gray-600">
                    ✖
                </button>
            </div>

            <!-- Cuerpo del modal -->
            <form  >
                <div class="p-4">
                    <label class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" wire:model="title"  id="title"  class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-200">

                    <label class="block text-sm font-medium text-gray-700 mt-4">Descripción</label>
                    <textarea wire:model="description"  id="description"   class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-200"></textarea>
                </div>

                <!-- Footer del modal -->
                <div class="flex justify-end p-4 border-t">
                    <button type="button" wire:click="closeCreateModal" class="bg-gray-300 px-4 py-2 rounded-md text-sm mr-2">
                        Cancelar
                    </button>
                    <button wire:click="CreateTask" type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endif

  
    </div>
</section>
