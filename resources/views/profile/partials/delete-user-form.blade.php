<title>Check-Inv</title>
<link rel="icon" href="{{ asset('images\favicon-16x16.png') }}" type="image/x-icon" />
<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Eliminar Conta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Depois de eliminar a sua conta, todos os seus recursos e dados serão permanentemente apagados. Antes de eliminar a sua conta, por favor faça o download de quaisquer dados ou informações que deseje manter.') }}
        </p>
    </header>

    <x-button
        variant="danger"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        {{ __('Eliminar Conta') }}
    </x-button>

    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable
    >
        <form
            method="post"
            action="{{ route('profile.destroy') }}"
            class="p-6"
        >
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium">
                {{ __('Tem a certeza que pretende eliminar a sua conta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Depois de eliminada, todos os recursos e dados associados à sua conta serão permanentemente apagados. Por favor, insira a sua palavra-passe para confirmar que deseja eliminar permanentemente a sua conta.') }}
            </p>

            <div class="mt-6 space-y-6">
                <x-form.label
                    for="delete-user-password"
                    value="Password"
                    class="sr-only"
                />

                <x-form.input
                    id="delete-user-password"
                    name="password"
                    type="password"
                    class="block w-3/4"
                    placeholder="Palavra-passe"
                />

                <x-form.error :messages="$errors->userDeletion->get('password')" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-button
                    type="button"
                    variant="secondary"
                    x-on:click="$dispatch('close')"
                >
                    {{ __('Cancelar') }}
                </x-button>

                <x-button
                    variant="danger"
                    class="ml-3"
                >
                    {{ __('Eliminar Conta') }}
                </x-button>
            </div>
        </form>
    </x-modal>
</section>
