<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="username" value="{{ __('Username') }}" />
            <x-jet-input id="username" type="text" class="mt-1 block w-full" wire:model.defer="state.username" />
            <x-jet-input-error for="username" class="mt-2" />
        </div>

        <!-- Contact -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="contact" value="{{ __('Contact') }}" />
            <x-jet-input id="contact" type="text" class="mt-1 block w-full" wire:model.defer="state.contact" />
            <x-jet-input-error for="contact" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('address') }}" />
            <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="state.address" />
            <x-jet-input-error for="address" class="mt-2" />
        </div>

          <!-- DOB -->
          <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="date_of_birth" value="{{ __('DOB') }}" />
            <x-jet-input id="date_of_birth" type="date" class="mt-1 block w-full" wire:model.defer="state.date_of_birth" />
            <x-jet-input-error for="date_of_birth" class="mt-2" />
        </div>

          <!-- Gender -->
          <div class="col-span-6 sm:col-span-4">
          <x-jet-label for="gender" value="{{ __('gender') }}" />
                <select id="gender" class="block mt-1 w-full" type="gender" name="gender" :value="old('gender')" required >
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                </select>
         </div>

          <!-- Status -->
          <div class="col-span-6 sm:col-span-4">
          <x-jet-label for="status" value="{{ __('status') }}" />
                <select id="status" class="block mt-1 w-full" type="status" name="status" :value="old('status')" required >
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                </select>
         </div>

          <!-- User_type -->
          <div class="col-span-6 sm:col-span-4">
          <x-jet-label for="userType" value="{{ __('userType') }}" />
                <select id="userType" class="block mt-1 w-full" type="userType" name="userType" :value="old('userType')" required >
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                </select>
         </div>
                
          <!-- school name -->
         <div class="col-span-6 sm:col-span-4">
          <x-jet-label for="schoolName" value="{{ __('School Name') }}" />
            <x-jet-input id="schoolName" type="text" class="mt-1 block w-full" wire:model.defer="state.schoolName" />
            <x-jet-input-error for="schoolName" class="mt-2" />
         </div>
    </x-slot>
    
    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}z`
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
