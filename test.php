<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    </head>
    <body>
<?php

include_once "RSA.php";

$enc = new RSAEnc(
    "hello mind",
    "-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDL+na5rAh3KSlzuPl+YmMiD0/o
g2Ir/TMSgaM7xA30pQEgEqrTHkIgLFs5rl5HgK4ZiZ3Bz692T7uJqLhlxoOeoO+d
Vay8ahcFqMUtTS1Gv7K3fV9n02eMRfW1N2dqHGg7/otkU53n9O5hqGSIik03ZMuj
AjhZisJazFr9o/jgOQIDAQAB
-----END PUBLIC KEY-----"
);

$encrypted = $enc->result();

print_r($encrypted);

$dec = new RSADec(
    $encrypted->result,
    "-----BEGIN PRIVATE KEY-----
MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAMv6drmsCHcpKXO4
+X5iYyIPT+iDYiv9MxKBozvEDfSlASASqtMeQiAsWzmuXkeArhmJncHPr3ZPu4mo
uGXGg56g751VrLxqFwWoxS1NLUa/srd9X2fTZ4xF9bU3Z2ocaDv+i2RTnef07mGo
ZIiKTTdky6MCOFmKwlrMWv2j+OA5AgMBAAECgYAszmveBUgmxMfyP6Oue3ZDORHY
hWO/PfNGEWwF6N8X6lcA8JjNn0vvPU8csIzNMBsOSQh6VmC4oHMVnhZDZQPsI/Mb
tliBC96mvNFgDY/aAtJJPAR1+BWCBpy4gGaFwTEztlyL5jqANoe7dJRaIZkakz4I
YRLwhpt7Cu5qo9QFwQJBAO/fXC+8HepUUi/vQgwGsxlIFIjVeRQMLR16a77Sa1G+
hG126doazCf8Ggf7Mfh626D4nlf1YUsDoePIiOsV+fUCQQDZsU0ATs6l5F7oJ0b2
Cca+4VpcXBbI053SgbRcXEQBztTPLDIoBk0322lWS+m0Z6i47jJrCdK8S4g2SsyZ
nM61AkEA4b+GVO5oARbmWnKD6CmN+KcbnEO7taBX/TwvluEVW1M/8n1NTJSXurHK
FeTUfJOzi2UwMHug2yZJ/8PFB+og2QJAGYKtg1u427fnZ00zA6IhqDzAWhJwmRgz
ZnfMqwYk8hFK3vxO5GHYqrMLpRFAUePT4dgIEIMWLvqq+7HISDgYAQJBAOvUYsMR
CgzbDRGpNk3Jzc/J8BD3m6z7inALb3UA/42sCfVxHF3vxccSRSz9qPyZsyGMwdp7
zfHyoTrPb/0smik=
-----END PRIVATE KEY-----",
    $encrypted->key
);

$decrypted = $dec->result();

print_r($decrypted);
?>
