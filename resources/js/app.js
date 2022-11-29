import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import MicroModal from 'micromodal';
MicroModal.init();

MicroModal.show('modal-1', { awaitCloseAnimation: true })

