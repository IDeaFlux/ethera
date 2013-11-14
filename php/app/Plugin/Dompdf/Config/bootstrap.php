<?php

App::uses('PdfView', 'Dompdf.View');
if (version_compare(Configure::version(), '2.1.1', '<')) {
    App::load('PdfView');
}

try {
    Configure::load('dompdf');
} catch(Exception $e) {
    Configure::load('Dompdf.dompdf');
}
