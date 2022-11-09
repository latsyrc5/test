<?php
/**
 * SAML 1.1 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote
 */

$metadata['https://authentication.ubc.ca'] = array (
  'entityid' => 'https://authentication.ubc.ca',
  'sign.logout' => true,
  'description' =>
  array (
    'en' => 'University of British Columbia',
  ),
  'OrganizationName' =>
  array (
    'en' => 'University of British Columbia',
  ),
  'name' =>
  array (
    'en' => 'University of British Columbia',
  ),
  'OrganizationDisplayName' =>
  array (
    'en' => 'University of British Columbia',
  ),
  'url' =>
  array (
    'en' => 'http://www.ubc.ca/',
  ),
  'OrganizationURL' =>
  array (
    'en' => 'http://www.ubc.ca/',
  ),
  'contacts' =>
  array (
    0 =>
    array (
      'contactType' => 'technical',
      'givenName' => 'Hari',
      'surName' => 'Mailvaganam',
      'emailAddress' =>
      array (
        0 => 'hari.mailvaganam@ubc.ca',
      ),
    ),
  ),
  'metadata-set' => 'shib13-idp-remote',
  'SingleSignOnService' =>
  array (
    0 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://authentication.ubc.ca/idp/profile/SAML2/POST/SSO',
    ),
    1 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST-SimpleSign',
      'Location' => 'https://authentication.ubc.ca/idp/profile/SAML2/POST-SimpleSign/SSO',
    ),
    2 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://authentication.ubc.ca/idp/profile/SAML2/Redirect/SSO',
    ),
  ),
  'ArtifactResolutionService' =>
  array (
  ),
  'keys' =>
  array (
    0 =>
    array (
      'encryption' => false,
      'signing' => true,
      'type' => 'X509Certificate',
      'X509Certificate' => '
MIIDMTCCAhmgAwIBAgIVAKsPemXgTlwq8/Rc3PYYuYJFP84BMA0GCSqGSIb3DQEB CwUAMCAxHjAcBgNVBAMMFWF1dGhlbnRpY2F0aW9uLnViYy5jYTAeFw0xNzAzMDEy MDU0MzBaFw0zNzAzMDEyMDU0MzBaMCAxHjAcBgNVBAMMFWF1dGhlbnRpY2F0aW9u LnViYy5jYTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAKTVraDsHjG9 BM2EK1jkLidzQAa1ay6YJ+QWnlfT7A/Xy1di9uQRbOMmWzeiqsgQrtRWOSiBLFed XIQXK8Oo/Re4d8OFDly2hrAWv2/nKKowBI8wm1wFTv7AI6p3CC0PsrNi9S0KfWbr mQXeEH60IM23VkW7FTvbhOdgljQZmgf5OHe2XnY5fGkWh+VBzzycfOoxu7Ga+0Vn PdTOgopVOKcGD2UaAMEuqwk2S/cu+A7ad9jkbhdx6VbnpnpGJ6RVeYOVXcgRrnSo /b0XoJRcpAa8sG/Sz4n7qH0Kvvv9+NchlP27iFjvgVQtRGj+AoSZEqtX+RLN2nA0 U5xPgbK6kMkCAwEAAaNiMGAwHQYDVR0OBBYEFFogy5ZJGsfDroMIttahaC1Pzi6G MD8GA1UdEQQ4MDaCFWF1dGhlbnRpY2F0aW9uLnViYy5jYYYdaHR0cHM6Ly9hdXRo ZW50aWNhdGlvbi51YmMuY2EwDQYJKoZIhvcNAQELBQADggEBACSlNQDPzpbeaN6+ bdTsKk26fcihp2SYX9ULM/wFY+JThrvtXjBL90Ym1vbvsic+plyf2ubYw/WvjHU3 8HEgqd2M+h/ltqT/ZKvEdxYxehLAJcPQmveh+QmqLsOY5bDLLpnT731lb6kcQhJ5 BXlLOxunIOUEY2vH53cLoTSkJgkTuV5AF9RxWdiqFzJVAZwOo7SUYqVC25WfzLUF borTeWMZNNvbTeT7ue37p1wEpuBbrRKNaHGaLg1x324VOx7t+g62t8y6e/uj2W/b QJDZ2JS3t1qx3TV3PlT2hpsuEAEjXBphJNdZ/E6gRCtNAs9WvmucwLXDmJk5HWtr aU7Aueo=
',
    ),
    1 =>
    array (
      'encryption' => true,
      'signing' => false,
      'type' => 'X509Certificate',
      'X509Certificate' => '
MIIDMDCCAhigAwIBAgIUWJCuJ2fBR3ks66f0+Cicvr8HguAwDQYJKoZIhvcNAQEL BQAwIDEeMBwGA1UEAwwVYXV0aGVudGljYXRpb24udWJjLmNhMB4XDTE3MDMwMTIw NTQzMVoXDTM3MDMwMTIwNTQzMVowIDEeMBwGA1UEAwwVYXV0aGVudGljYXRpb24u dWJjLmNhMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAo4L+YKgVeo+w PcVRABe19FKQHvTtS0w5zRlDxIPQC+vrC5RJ1E+WspxbIVimD8OV70E8p7zW83XN gcnvkGJZ+funPF2POi4b16oxWsNxTN/5ow0MfDV8zcUrFfWIHBfKy/4LObrTPp3G heya1XwZ8WOUROWoWHCOdtGQCLHj+sMGvFR5vy17zHy4byT+BN3q5w8gclewi30T H4PBVPe/x77yHSxzxbv2s+PcSVSafV/9rFNRKxt+961JMGW4Tq7gvWjs/5AH6iCE EIC7GbMI0SfrUvLRzDJonEDUX6vLEehoo8f4WGtum/2wwl5L32A9H/HEJUESj6iz VA8EdJRBDQIDAQABo2IwYDAdBgNVHQ4EFgQUPXjaScj36w8sU0pcGJO2PBer7Xkw PwYDVR0RBDgwNoIVYXV0aGVudGljYXRpb24udWJjLmNhhh1odHRwczovL2F1dGhl bnRpY2F0aW9uLnViYy5jYTANBgkqhkiG9w0BAQsFAAOCAQEAGw6mVaUFyFcj2xfi P0QO7T+CAhVJPmTSrtJYcjiCScKMgc8jnZSrAY1jcYNshGM1qc9g0IvoCOg58z6z H2TTq9kcwRQgQZpdAh6xKeRhU7SM7Ck3/KgR1+lcE25W9g95Algdj1Fp47bBRp5B VzXTn7r1+7u5ddnkvLu9/2h7h5zREs+HwnzidMGckk2zjLlIRKPgJwVUgXA9BPTu 10W15fbJ7m1QEz4KYg8pkE4yv6CAfs5q5ovjsUpXsEcAau3Klezs6nEHBLu1HKn9 XiXVPT17bJPtbMSsowPAngJv8Hd4cNACv+mbsd+Z77hWn7rX8u6ER9Fv7xtdEG61 3jAsAg==
',
    ),
  ),
  'scope' =>
  array (
    0 => 'ubc.ca',
  ),
  'UIInfo' =>
  array (
    'DisplayName' =>
    array (
      'en' => 'University of British Columbia',
    ),
    'Description' =>
    array (
      'en' => 'Authentication Identity Provider',
    ),
    'InformationURL' =>
    array (
    ),
    'PrivacyStatementURL' =>
    array (
    ),
    'Logo' =>
    array (
      0 =>
      array (
        'url' => 'https://authentication.ubc.ca/ubc.png',
        'height' => 80,
        'width' => 80,
      ),
    ),
  ),
);
