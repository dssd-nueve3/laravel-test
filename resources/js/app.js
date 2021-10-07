require('./bootstrap');

import Alpine from 'alpinejs';
import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';


window.Alpine = Alpine;
window.FilePond = FilePond;


Alpine.start();
FilePond.start();
