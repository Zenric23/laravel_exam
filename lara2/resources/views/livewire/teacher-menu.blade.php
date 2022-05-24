<div>
     <!-- Livewire component for My Class menu -->
    <div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModal">
            {{ __('Create') }}
        </x-jet-button>
    </div>
     <table class="w-full">
         <thead class="border">
             <tr>
                 <th class="py-5 border">Class id</th>
                 <th class="py-5 border">Course code</th>
                 <th class="py-5 border">Description</th>
                 <th class="py-5 border">Units</th>
                 <th class="py-5 border">Action</th>
             </tr>
         </thead>
         <tbody>
             @if ($data->count())
                @foreach ($data as $item)
                    <tr class="text-center">
                        <td class="py-3 border">{{ $item->class_id }}</td>
                        <td class="py-3 border">{{ $item->course_code }}</td>
                        <td class="py-3 border">{{ $item->desc }}</td>
                        <td class="py-3 border">{{ $item->units }}</td>
                        <td class="py-3 border text-indigo-600 space-x-5">
                            <a style="margin-right: 20px; color: green;" href="/users/{{ $item->course_code }}" >
                                invite student
                            </a>
                            <a style="margin-right: 20px; color: violet;" href="/enrolledStudent/{{ $item->course_code }}" >
                            view students
                            </a>
                            <a href="/upload/image/{{ $item->course_code }}" >
                            view resources
                            </a>
                        </td>
                @endforeach
            @else 
                <tr>
                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                </tr>
            @endif
         </tbody>
     </table>
     </div>


     {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Add Class') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="course_code" value="{{ __('Course Code') }}" />
                <x-jet-input wire:model="course_code" id="course_code" class="block mt-1 w-full" type="text" />
                @error('course_code') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="desc" value="{{ __('Description') }}" />
                <x-jet-input wire:model="desc" id="label" class="block mt-1 w-full" type="text" />
                @error('desc') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="units" value="{{ __('Units') }}" />
                <x-jet-input wire:model="units" id="units" class="block mt-1 w-full" type="number" />
                @error('units') <span class="error">{{ $message }}</span> @enderror
            </div>
            <!-- <x-jet-input wire:model="teacher_id" id="teacher_id" class="block mt-1 w-full" value="1"  type="number" /> -->
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if ($modelId)
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-danger-button>
            @else
                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-danger-button>
            @endif
            
        </x-slot>
    </x-jet-dialog-modal>
</div>
