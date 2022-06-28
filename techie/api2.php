<?php
$response = $client->request('POST', 'http://httpbin.org/post', [
    'form_params' => [
        'field_name' => 'abc',
        'other_field' => '123',
        'nested_field' => [
            'nested' => 'hello'
        ]
    ]
]);



use GuzzleHttp\Psr7;

$response = $client->request('POST', 'http://httpbin.org/post', [
    'multipart' => [
        [
            'name'     => 'field_name',
            'contents' => 'abc'
        ],
        [
            'name'     => 'file_name',
            'contents' => Psr7\Utils::tryFopen('/path/to/file', 'r')
        ],
        [
            'name'     => 'other_file',
            'contents' => 'hello',
            'filename' => 'filename.txt',
            'headers'  => [
                'X-Foo' => 'this is an extra header to include'
            ]
        ]
    ]
]);