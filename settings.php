<?php

const CLIENT_ID     = '0u6n0EvjYr';
const CLIENT_SECRET = 'jR2qMb53xaf4NBFnQUZzPU57niajLPgP4Ab9qrGJb8984FhN';
const REDIRECT_URI           = 'http://inbloom.hunterskrasek.com'; // This must match your app settings in SLC App Registration exactly!

const AUTHORIZATION_ENDPOINT = 'https://api.sandbox.slcedu.org/api/oauth/authorize';
const TOKEN_ENDPOINT         = 'https://api.sandbox.slcedu.org/api/oauth/token';

// Note:  Windows PHP instances have issues with the SSL certificate that is returned from the sandbox.
//        If you are running Windows against the sandbox, you may want to switch the flag below to TRUE.
//        Use at your own risk and ONLY in sandbox (not production) usages of the API.  In production,
//        please fix the issue with CA certifications on your server and set this flag to FALSE.
const DISABLE_SSL_CHECKS = FALSE;

?>
