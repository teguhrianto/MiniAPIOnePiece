<?php

namespace View;

class JsonView {
    /**
     * Renders a JSON response with the provided status, data, message, and status code.
     *
     * @param mixed $status The status of the response.
     * @param mixed $data The data to be included in the response.
     * @param mixed|null $message The optional message to be included in the response.
     * @param int $statusCode The optional status code of the response. Defaults to 200.
     * @return void
     */
    public static function render($status, $data, $message = null, $statusCode = 200) {
        $response = [
            'status' => $status,
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
