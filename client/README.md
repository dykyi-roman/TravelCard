# Sort Method

 ``` 
   POST data
```       
## Description
Send a json encode array with city names and position index.

## Parameters
Essential information:
+ data => json string. Example: ``` ['Odessa','Lviv',0], ['Kiev','Odesa',1], ['Lviv','Berlin',2] ```

## Return format
Status code 200, along with a JSON array containing sorting position. Example: ``` [1,0,2] ```
***

## Errors
All known errors cause the resource to return HTTP error

- **400 Bad Request** — One or more of the essential parameters is missing. You have either missed the file attachment, photo_id, or the upload key.
- **401 Unauthorized** — One or more parameters required to authenticate your request is missing.

[HTTP multipart POST request]: https://www.ietf.org/rfc/rfc1867.txt

## Example
**Request**

    POST api/index.php
    
** Params **
``` json
  [["Stockholm","New York",0],["Gerona","Stockholm",1],["Madrid","Barcelona",2],["Barcelona","Gerona",3]]
```

**Return**
``` json
   "[2,3,1,0]"
```

