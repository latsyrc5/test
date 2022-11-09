<?php
/**
 * SAML 1.1 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote
 */

$metadata['https://authentication.stg.id.ubc.ca'] = array (
  'entityid' => 'https://authentication.stg.id.ubc.ca',
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
      'Location' => 'https://authentication.stg.id.ubc.ca/idp/profile/SAML2/POST/SSO',
    ),
    1 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST-SimpleSign',
      'Location' => 'https://authentication.stg.id.ubc.ca/idp/profile/SAML2/POST-SimpleSign/SSO',
    ),
    2 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://authentication.stg.id.ubc.ca/idp/profile/SAML2/Redirect/SSO',
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
MIIDTTCCAjWgAwIBAgIVAJccYyIV6wly8XyddumpgnHMJ2JLMA0GCSqGSIb3DQEB CwUAMCcxJTAjBgNVBAMMHGF1dGhlbnRpY2F0aW9uLnN0Zy5pZC51YmMuY2EwHhcN MTcwMzAxMTk1NDM0WhcNMzcwMzAxMTk1NDM0WjAnMSUwIwYDVQQDDBxhdXRoZW50 aWNhdGlvbi5zdGcuaWQudWJjLmNhMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIB CgKCAQEArRl/RJQ7BBv4AGFEk6hbnPRaFYOYTLTYT05iiatffdwGkWGvhf9ffPBl 8l1a4l3fLk69M2zvDcjJngBi8voeqjqIU9n9SmbAoG+lX6JUNKl435Bx6+WIT0Q1 pblemqp5xXHXjmsWKHrdzvNXXSiPgZ0En9I0lsaFcGLACIUaFEhn/FYJZrqFAdIL 9S8wDmWsWIbt+mqiP4YWMMY60DlmSC8VgKwhyT3+FIacxP/NpL24PiDpDJer7aTD yqzBonVFiVRVPqLLHpd883CoNC8ncvSVcF4mR6M2duPXJLOK4bU+K8JzLbsYxUgE MMkmRBdi/n8PpSUvd870wXW4kfHfxQIDAQABo3AwbjAdBgNVHQ4EFgQUN5GZVXNQ E/3EvfJT56pr/GEzQI4wTQYDVR0RBEYwRIIcYXV0aGVudGljYXRpb24uc3RnLmlk LnViYy5jYYYkaHR0cHM6Ly9hdXRoZW50aWNhdGlvbi5zdGcuaWQudWJjLmNhMA0G CSqGSIb3DQEBCwUAA4IBAQA2e2WkSxnVFXvxAj0njn8H/vl+YhLdN/xdLZ/Np5t5 /duEVUgHaW0bILsKxdw2+5VGgHBmVGButmodPhA5OHg6gCDNJ4gqjrqfNfon3/yS r0jvm1EZ44+IFTrrRt9aTppKnmEVkYs6fP46cygo3rSWuSHeNbZPZBEJ81l52snJ QIHGPdDtE387EsjDMAI2YjbCQfNkrmB6yedLURu/m34MzAgtCPYx9uWMcJ5DleaR XvSl3XmcDg63y+jqYhVCHuYV5eqIXj1OF3WPk438xUuh6HuHKIwQqHBz7udxbH3Z bb6jXGDJjiDHt1LRJ8xbVisFIcDlIwsGQQi0HeEJfx4P
',
    ),
    1 =>
    array (
      'encryption' => true,
      'signing' => false,
      'type' => 'X509Certificate',
      'X509Certificate' => '
MIIDTDCCAjSgAwIBAgIUelptJqDnS5mQ5KlE1U7kJJYVqOYwDQYJKoZIhvcNAQEL BQAwJzElMCMGA1UEAwwcYXV0aGVudGljYXRpb24uc3RnLmlkLnViYy5jYTAeFw0x NzAzMDExOTU0MzVaFw0zNzAzMDExOTU0MzVaMCcxJTAjBgNVBAMMHGF1dGhlbnRp Y2F0aW9uLnN0Zy5pZC51YmMuY2EwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEK AoIBAQDA1b3xW7AlagzA67GOq2pDFfY4OY8+Z9Rp9fM43sdpHNSxLnOZf0cTOfpX xevAlmjtSY1y34/F59P6hULM5L28TOy1GJjfNoliGl4pFnVqjuRxtJYb3D2nu1dz URKhBkV3tqK0iFN/c3bXwYYdQOcavHdtqCOSAjub8oGrwjxS95tGda102aTotJ9K /4Q2sZbcXmrgvxgvnjCubsRqDX7jTBXPmfaNnnH1eBaVkjkk3OBCw590DykSmpqh qcOT4N+R2Dkt5GWxREP51wvMbks5cgipvx0q9ICNNecfVPTA/fCicZs91mndcy8T O7RWqkqW1V44rPhDddFxKlRv312bAgMBAAGjcDBuMB0GA1UdDgQWBBQMewgM36IE QYzyZ1cgx2o6iYpacDBNBgNVHREERjBEghxhdXRoZW50aWNhdGlvbi5zdGcuaWQu dWJjLmNhhiRodHRwczovL2F1dGhlbnRpY2F0aW9uLnN0Zy5pZC51YmMuY2EwDQYJ KoZIhvcNAQELBQADggEBAByoR/Yk1hIlo/VsXdQqR9ngYLPH47oA3rIASzA1d4ek juzsv7L7VHcm7rtYPMFecVwLkDGAsC8nHOPbf4L6rdvvkc+OT88dMooudgdAbvEo G8d4sSpJI8ZBUWJkFqMucX8EU6UT328REEo9Srb6Sxb3btsNZ2g5zi/f7zqexYO5 RzcOSDI8CujAyY+yoTvZhWHxnDgOmUFZe2jLh0exj4NsFx5ygT1n2uRRg2H2oJ5N GjCr3rY8MYltz24oKf8dbJGu3eVZwehelxb2+vHaqhaks4loBgg2Wup2nnKz0bEw MP0BO0FDvjHQlrIMlHo4KwFXXXpUnrR1VVVHXe3a1Y8=
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
      'en' => 'STG Identity Provider',
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
        'url' => '
http://brand2.sites.olt.ubc.ca/files/2012/08/UBCLogo_Black1.png
',
        'height' => 80,
        'width' => 80,
      ),
    ),
  ),
);
