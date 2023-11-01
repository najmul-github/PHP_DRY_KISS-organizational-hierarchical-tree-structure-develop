# API Documentation

## Introduction

This API provides access to organizational hierarchy data.

## Endpoints

### Get Employee Information

- **Endpoint:** `/api/employees/{id}`
- **Method:** GET
- **Description:** Retrieve information about a specific employee.

#### Request

- **URL Parameters:**
  - `id` (integer) - The ID of the employee to retrieve.

#### Response

- **Status Code:** 200 OK
- **Response Content:**

```json
{
  "id": 1,
  "name": "John Doe",
  "department_id": 2,
  "role_id": 5
}
```

## List Employees
- Endpoint: /api/employees
- Method: GET
- Description: List all employees.
### Request
- Response Status Code: 200 OK
- Response Content:

```json
[
  {
    "id": 1,
    "name": "John Doe",
    "department_id": 2,
    "role_id": 5
  },
  {
    "id": 2,
    "name": "Jane Smith",
    "department_id": 2,
    "role_id": 3
  }
]
```

## Authentication
The API requires authentication using a token passed in the request header. Include the token in the Authorization header.

## Error Handling
The API returns appropriate error responses with status codes and error messages in case of issues.

## Contact Information
For API-related inquiries, please contact [najmulhoq95@gmail.com].