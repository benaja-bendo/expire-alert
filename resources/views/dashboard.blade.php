<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tout les agents') }}
            </h2>
            <button data-micromodal-trigger="modal-1" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter un agent</button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <ul class="p-2">
                    @foreach ($agents as $agent)
                    <li class="flex flex-col mb-1">
                        <div class="flex justify-between mb-2 mt-1">
                            <span>{{ $agent->name }} </span>
                            <div>
                                <span>{{ $agent->email }}</span>
                                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded">Ajouter un certificat</a>
                            </div>
                        </div>
                        <div class="flex flex-col bg-gray-200 ml-2 pt-1">
                            @forelse ( $agent->certificats as $certificat)
                            <div class="flex justify-between items-center pb-1 px-1">
                                <a href="{{ $certificat->file }}" class="text-blue-500 hover:text-blue-800">Lien du document</a>

                                @if (Carbon\Carbon::parse(now())->diffInDays($certificat->expirated_at) <50) <span class="text-red-500 font-semibold"> expire dans {{ Carbon\Carbon::parse(now())->diffInDays($certificat->expirated_at) }} jours</span>
                                    @elseif (Carbon\Carbon::parse(now())->diffInDays($certificat->expirated_at) >50 && Carbon\Carbon::parse(now())->diffInDays($certificat->expirated_at) < 80) <span class="text-orange-500 font-semibold"> expire dans {{ Carbon\Carbon::parse(now())->diffInDays($certificat->expirated_at) }} jours</span>
                                        @else
                                        <span class="text-green-500 font-semibold"> expire dans {{ Carbon\Carbon::parse(now())->diffInDays($certificat->expirated_at) }} jours</span>
                                        @endif
                            </div>
                            @empty
                            <div class="flex justify-center items-center p-1">
                                <span class="text-gray-500">Aucun certificat</span>
                            </div>
                            @endforelse
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title">
                        Micromodal
                    </h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <p>
                        Try hitting the <code>tab</code> key and notice how the focus stays within the modal itself. Also, <code>esc</code> to close modal.
                    </p>
                </main>
                <footer class="modal__footer">
                    <button class="modal__btn modal__btn-primary">Continue</button>
                    <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
                </footer>
            </div>
        </div>
    </div>

</x-app-layout>
