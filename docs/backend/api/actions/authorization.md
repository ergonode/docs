# Authorization

----

## POST /api/v1/login

Login action, return JWT token.


**Request body parameters**

|   Parameter  |     Type     | Required |    Additional information   |           Example           |
|:------------:|:------------:|:--------:|:---------------------------:|:---------------------------:|
|  username    |    string    |    yes   |        username             |            test@bold.net.pl            |
|  password    |    string    |    yes   |        password             |   123            |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns JWT token | JWT token                        |
| 400  | Bad request | [Error](backend/api/objects/error.md)                    |
| 401  | Bad credentails         | [Error](backend/api/objects/error.md)        |

**Response example**

```
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NTA2NjY1NjAsImV4cCI6MTU1MDc
  1Mjk2MCwicm9sZXMiOltdLCJ1c2VybmFtZSI6InRlc3RAYm9sZC5uZXQucGwifQ.BKjkV6jCSu_Ok1MfTb02H4
  Q10FQb0JLYFBp4ejjfFcQFIOBhjdaBR0k9kmnseVpwP3FYZo9KCrkfaEBLF3m8VD-QcY9QI8tRocQDMsRFTVVe
  agHOfLjosGWqNLvSyYxK7Yj70sINNqqXhjyZYjbfEwAsKQ45styQ2PPrK3v-eFz0SMJ8oANukFc7F2pUhODDt_
  htxAFeNZfOXlE8Uq-AZKmp5Mx6x8E5_HVMRDqnFTOeuhUMsR5ra8Q6ep9gjPESGOE4aTPJEeomL_2Q74r6xwFp
  oUpEYXg68uA2JD1nLSy8cJf8JJ52GqVxsplcg5cp4KVAKQXvKyRWo9qU-4R3bsCG-1XcqE3_pzY146PxBey5V7
  w9nYjUo44NANiDC_AQnjawRHb71IId3xUh37d89MgnF7LX2LbHI5oT7DAXfUw_fspb8rny8sbUgnqJjLv3n29v
  baHotdDMwV0iwH3zDIG8BArLZA8CDK7LL3pO7gn2flwCu-t2d0c_PVddRfs63z6w5hnnFTKq5oHD-I0_Ji2ICf
  u8MVpbHMPEmzFlbSOhyC_yZX8-0zlTYztzKNDoLDxGqoLSy1i6mRE6v4neS7mOVMKMHdxNmaoizioDn-_3FK5v
  9zDpxUTYKkF__4Q8Uo0_a6wBtRiNoHIS-pPIXQ7PYuhcm0ElPXWPL_kojRY"
  
}
```
_________________________________________
