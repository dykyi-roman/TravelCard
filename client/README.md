# Sort Method

   + POST
       

## Return format
A HTTP 200 OK header along with a string

***

## Errors
All known errors cause the resource to return HTTP error

- **400 Bad Request** — One or more of the essential parameters is missing. You have either missed the file attachment, photo_id, or the upload key.
- **401 Unauthorized** — One or more parameters required to authenticate your request is missing.
- **403 Forbidden** — Authentication of the request has failed. This means although the parameter in question was present, its verification has failed.
- **404 Not Found** — The provided is not known to our database.

[HTTP multipart POST request]: https://www.ietf.org/rfc/rfc1867.txt