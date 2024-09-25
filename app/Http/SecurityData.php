<?php

namespace App\Http;

class SecurityData
{
	//public static string $MerchantId = "******";
	public static string $MerchantId = "9104234836";
    /**
     * JWE Key Id.
     *
     * @var string
     */
    public static string $EncryptionKeyId = "19f84b5655f04e25a99b09f1ee2fac78";

    /**
     * Access Token.
     *
     * @var string
		USD 
		87075a8448b811edaf360279bcee2f04
		NPR
		94e92b1059b211edaf360279bcee2f04
     */
     //public static string $AccessToken = "hdghgdad372c5426d855017aa857c469d";
	public static string $AccessToken = "c850a40341fa402fb50d37e45e5dbcc1";//NPR/USD API KEY///////////
	


    /**
     * Token Type - Used in JWS and JWE header.
     *
     * @var string
     */
    public static string $TokenType = "JWT";

    /**
     * JWS (JSON Web Signature) Signature Algorithm - This parameter identifies the cryptographic algorithm used to
     * secure the JWS.
     *
     * @var string
     */
    public static string $JWSAlgorithm = "PS256";

    /**
     * JWE (JSON Web Encryption) Key Encryption Algorithm - This parameter identifies the cryptographic algorithm
     * used to secure the JWE.
     *
     * @var string
     */
    public static string $JWEAlgorithm = "RSA-OAEP";

    /**
     * JWE (JSON Web Encryption) Content Encryption Algorithm - This parameter identifies the content encryption
     * algorithm used on the plaintext to produce the encrypted ciphertext.
     *
     * @var string
     */
    public static string $JWEEncrptionAlgorithm = "A128CBC-HS256";

    /**
     * Merchant Signing Private Key is used to cryptographically sign and create the request JWS.
     *
     * @var string
     */
    public static string $MerchantSigningPrivateKey = "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";
    /**
     * PACO Encryption Public Key is used to cryptographically encrypt and create the request JWE.
     *
     * @var string
     */
    public static string $PacoEncryptionPublicKey = "MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEA6ZLups2K0iYEMxQqgASX8gY6tWhNVCp08YuDgjCsOVrGVgUHD0dh0TWFNJ7Lq2Jp0SOsGgi54+hrjwPOL2CCZxw8pKUlL57UksoD9oWUrK/KkSvEAwPU4cZqzxIXyhBcZb8O96iN4WQJILkRTg+DXLkML6qisO496fPGIs+vCoc87toucy5O9fRfaYSjcqjreyi8JDkvVJM/BeNtOEM2a0b/lcWa67RH+tN97H25k+Qez7QthLru6oBfWBgD6iIwhV+ICqLWHmp6fQ+DHQk/o+OO3yFiY9OAvMiy8MOTinvkBlFwYgYNznG3/w0Xh8U5vtudUXPDNUO6ddf4y99+6LlWDiKgJn/Th93YUg+gFH4LUJHyPrSY2JuC+Q8kksp2xyiZDTHGzi96kturwrqCui6TytCHcU4UB0VRMR+M7VRl3S2YPhcxv5U8Fh2PITqydZE5vv1Va06qhegjOlSZnEUl2xKPm5k/u+UHvUP/oq04fQLTlYqyA3JYDCe4z5Ea2SOgjeVl+qTatWYzmkUXyCONLZ4UaRrgbYCp0nCPHoTFgRQdChu8ezDbnYY9IW7cT/s2fEi5N7X1XrQttiEP4rbn0y0qVYYjN86+elfhtYGHidZTUSUS5RSTHqOkj59p5LIGwFF9iTXzCjfUqq8clnfOk76qSLY1+Kj+SMMe6Z8CAwEAAQ==";
    /**
     * PACO Signing Public Key is used to cryptographically verify the response JWS signature.
     *
     * @var string
     */
    public static string $PacoSigningPublicKey = "MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAr0XW6QacR8GilY4nZrJZW40wnFeYu7h9aXUSqxCP6djurCWZmLqnrsYWP7/HR8WOulYPHTVpfqJesTOdVqPgY6p10H811oRbJG9jvsG8j8kn/Bk8b2wZ9qelNqdNJMDbR5WUyaytaDWW6QdI4+clqjFfwCOw76noDSe+R4pDSzgMiyCk5R4m2ECT1fv/4Axz2bvLN+DRTg5DPPIMLWpA87lgjxeaDlGyJqZCbkJozW7JX0AJVc0X7YR9kzbiTi3LVOInSKY+VHT8yCARIdvXtKc6+IWSbVQqgpNIBB8GN0OvU8xedjPNCMGZnnMtgd7XLTf/okyadbdNLAqQLTbDs/5HnIVx8FyfgiOS/zsim5ivi3ljVAW3T3ePGjkY0q1DMzr5iJ4m/WTL2d1TArlfHyQhkSpFpQPOO+pJyVQqttHJo99vMirQogdSx4lIu//aod0yJyJLpjCeiqb2Fz3Qk0AZ4S78QKeeGsxTRchTP6Wsb6okaZd+cFi6z8qbP0z/Y3xRZO7vOLB/whkqS+pMVKBQ42YzgQPRzbXXmgCkf1nCqgrD9bnIB5ovdRGfDXW86GKY8XwGVjb4BoMvql+HsbonKHAO+eGfQulpB5YfQGQU3ZXdMdfCLAk8FuqemH4k7S7diLzVvRCuisHsEx6qJ4ewxzNCvW7OGVinTR9NSQUCAwEAAQ==";
    /**
     * Merchant Decryption Private Key used to cryptographically decrypt the response JWE.
     * @var string
     */
    public static string $MerchantDecryptionPrivateKey = "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";
}