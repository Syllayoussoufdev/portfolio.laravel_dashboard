<x-guest-layout>
    {{-- <form method="POST" action="{{ route('Register.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div> --}}

@section('content')

<div class="min-h-screen flex items-center justify-center px-4 py-12" 
     style="background: linear-gradient(135deg, #1a2845 0%, #16213e 100%);">
    
    <!-- Largeur ajustée à max-w-lg pour un aspect plus équilibré -->
    <div class="w-1/2 justify-center  max-w-lg bg-white rounded-2xl shadow-2xl p-8 border border-white border-opacity-20">
        
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-green-500 rounded-2xl mb-4">
                <i class="fas fa-user-plus text-white text-3xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">
                {{ __('Créer un compte') }}
            </h2>
            <p class="text-gray-500 text-sm">
                {{ __('Rejoignez-nous dès aujourd\'hui') }}
            </p>
        </div>

        <!-- Utilisation de space-y-4 pour gérer l'espacement proprement sans <br> -->
        <form method="POST" action="{{ route('Register.store') }}" class="space-y-4">
            @csrf

            <!-- Chaque champ est maintenant en w-full -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">{{ __('Nom complet') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-200" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-200" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">{{ __('Mot de passe') }}</label>
                <input id="password" type="password" name="password" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-200" required>
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">{{ __('Confirmer le mot de passe') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-200" required>
            </div>

            <div>
                <label for="titre_professionnel" class="block text-sm font-semibold text-gray-700 mb-1">{{ __('Titre professionnel') }}</label>
                <input id="titre_professionnel" type="text" name="titre_professionnel" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-200" required>
            </div>

            <div>
                <label for="slug" class="block text-sm font-semibold text-gray-700 mb-1">{{ __('Slug Utilisé') }}</label>
                <input id="slug" type="text" name="slug" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-200" required>
            </div>

            <!-- Bouton plein largeur (w-full) -->
            <button type="submit" class="w-full mt-4 py-3 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl">
                {{ __('S\'inscrire') }}
            </button>
        </form>

        <div class="mt-6 text-center text-sm">
            <p class="text-gray-600">
                {{ __('Vous avez déjà un compte ?') }}
                <a href="{{ route('login') }}" class="text-green-500 hover:text-green-600 font-semibold hover:underline">
                    {{ __('Se connecter') }}
                </a>
            </p>
        </div>
    </div>
</div>

@endsection
</x-guest-layout>
