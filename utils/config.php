<?php

class CONFIG {

    const DATE_FORMAT = "Y-m-d\TH:i:sP";

    
    public static $virtualAccount = ['virtual_account', 'credit_card'];

    
    public static $paymentStatus = ['pending', 'paid', 'failed', 'expired'];

    
    public static $clientId = 'bf68e886ab0470be3c779adbe5889d81';

    
    public static $clientSecret = '99569047bd86482ecff5f20f62ef1ace7ec88d7a2f124eb8de1cfc757018a11f';

    
    public static $merchantId = '8ef1df1e9a60d602b2ff7be37720ecf7';
    

    public static $publicKey = <<<EOD
    -----BEGIN PUBLIC KEY-----
    MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA2C1FgwuFiQYhhFEdJQJH
    X6mTl7LrFCQ7uK4UJtKRtNCtwOqfNm8AkogyUMZOQSRRk64eb0lluAyVGJHzdXNO
    FsvCONY7Dwf/fBC4I3TSSxJOJT97VV5I7vqrsphYXzrSShjyR7mzIH4a3ud0tUSA
    OBMOR752HL/xk2xGWrOzhySz151TiPWAcV0qnbSYoUrxuVUwWYTBQhh76DM9Fu2U
    pcKQ2vNMeo7t6wiaG8cVPB7LOD57BFkrtJrBi0m45QEyIIatNsmzXYw3UouhgTQS
    cdxoNeRA0M1vsodmql5qrtW3smMRkIeSKwz5XAUM7oO2rSF3PVPvNdOWxNxlPKBL
    fwIDAQAB
    -----END PUBLIC KEY-----
    EOD;


    public static $privateKey = <<<EOD
    -----BEGIN PRIVATE KEY-----
    MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDYLUWDC4WJBiGE
    UR0lAkdfqZOXsusUJDu4rhQm0pG00K3A6p82bwCSiDJQxk5BJFGTrh5vSWW4DJUY
    kfN1c04Wy8I41jsPB/98ELgjdNJLEk4lP3tVXkju+quymFhfOtJKGPJHubMgfhre
    53S1RIA4Ew5HvnYcv/GTbEZas7OHJLPXnVOI9YBxXSqdtJihSvG5VTBZhMFCGHvo
    Mz0W7ZSlwpDa80x6ju3rCJobxxU8Hss4PnsEWSu0msGLSbjlATIghq02ybNdjDdS
    i6GBNBJx3Gg15EDQzW+yh2aqXmqu1beyYxGQh5IrDPlcBQzug7atIXc9U+8105bE
    3GU8oEt/AgMBAAECggEAa9RZIf6zQyANw+R59yXl2C/L8RVL8SYJrBsY7iyGhXy5
    zsq5U/uWe4D4KBZinlexYUqu36/qzx1nmXPjzqgPQYute5BQsTS6GXZ1gyoYY13k
    IOxDZte65Ymf71vSaN38Wv2KjIByezirypgFPQ3ILzBCJUM5wylzJKgTh9avLC8V
    3Tggx6sDKdo7qwdc7B5AEhExDFS6wApQHG5v2vVPHUZ/DfpZN9Y6MYKbujwycn4S
    KDQZ15Ylp0BvSJRxow08gdhRZFx0l4rsXHS5adKvmHFryzayIrmszs1QIL1jyWR4
    KRmdndcZR9bAobGSQjBcRJizqUc9WL57xOFVLO5h0QKBgQDsb5uH6qavL5GWe7pm
    4AzqFouGZMqq4+4m6PpFC8zYCtjE0XU4j8CWD67zcuhCSew9/s9vokex/PEe5aua
    8A/tEsNVDZ7kwVZ6nEifoAzOPTI/c7PW/fA2KcNH+2ARS/MtI5H3HyvRmv/unnIt
    m32Q+2lzeL8pzVtKEF2U2cxbFQKBgQDqEIR/RDBRAenbivgclWD0ioRZfKVbksxH
    YW+41dHsbuO/sQVb9lZ6wSQTiYfgmSM+mPi/NEWW/rTAWbBkqQlEj0yhWGfl7mzO
    dlHfMuzlzODhoZOPiwHQw/f0aSC9SjL8eRhQZ1Q1uZJG/WVbr0khmU8zYaKsoWdV
    VwenqXvhQwKBgESKymTpoq7QtH0Sm2QtebD3HjW0zIgkEatYCQ2xMQ5Efrj4G+ps
    yiD2pPpQioKFGaaTUyGCwxQXRvN1E32UMJnCwbvLeg/I+MAMxIT6ChxT41g/u5gM
    //FDxCf++Meq4/FnCW7Bq5tVOvK7HlCYbht0twpRq+F7dgaPngGD7llNAoGBAJPF
    L9ElHJfX7GtlVfS9vgNE+/9++OpSSFN8SUtY+noZHAHmYWrIn5pKG1uWRUlfhOe9
    LbWQ66pDTZvuQ7WZHjfBfHCUXqvEFb9W5aNTBEqkSQlJt940tUW2ovET+c5nbL8G
    OHpycbClYpsc2QPEKxhiMKVQq6HvGEzBcBzCnGn/AoGAQuBwHywjbUeAcKQfpqTw
    Ew/kQcl+nlRj8M55xhJWry7OmeCnol6OGPlMIwjN94xzkhzWaJA+ea7wwnyCz1oK
    sjpniHHJab/gABjwZG1o+Aq9BCH4fKnWxs+kIXDJ0WWOu360phsgu8NNHSQBhVeX
    OR+uD+qmymc4WpDqp/dWkR0=
    -----END PRIVATE KEY-----
    EOD;
}

?>