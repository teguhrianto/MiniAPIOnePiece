<?php

namespace Views;

class JsonView {
    /**
     * Renders the response as JSON.
     *
     * @param mixed $data The data to be included in the response.
     * @param string|null $message The optional message to be included in the response.
     * @param int $statusCode The optional status code of the response. Defaults to 200.
     * @return void
     */
    public static function render($data, $message = null, $statusCode = 200) {
        $response = [
            'status' => $statusCode, // Use HTTP response code as the status
            'data' => $data,
        ];

        if ($message !== null) {
            $response['message'] = $message;
        }

        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
?>
