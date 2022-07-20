Laravel Currency - with bearer Authentication <br />

API Usage: <br />
1.  Login first <br />
    POST to: http://localhost:8000/api/login<br />
    example post param: <br />
    email = agus.supriono@gmail.com<br />
    password = agus123<br />
<br />
    example return param: <br />
    {<br />
    "success": true,<br />
    "data": {<br />
        "id": 1,<br />
        "fullName": "Agus Supriono",<br />
        "token": "1|76dl6lLeXXiwz7tHh65URvnlh6LGh16SraQFfHsV"<br />
    },<br />
    "message": "User signed in"<br />
    }<br />
 <br />
    use token in data return value for bearer authentication<br />
<br />
2.  List Currencied<br />
    GET to : http://localhost:8000/api/currencies<br />
    TOKEN = "1|76dl6lLeXXiwz7tHh65URvnlh6LGh16SraQFfHsV"<br />
<br />
    example return param:<br />
    {<br />
    "success": true,<br />
    "data": {<br />
        "data": [<br />
            {<br />
                "code": "EUR",<br />
                "name": "Euro"<br />
            },<br />
            {<br />
                "code": "USD",<br />
                "name": "US dollar"<br />
            },<br />
            {<br />
                "code": "JPY",<br />
                "name": "Japanese yen"<br />
            },<br />
            {<br />
                "code": "IDR",<br />
                "name": "Indonesia Rupiah"<br />
            }<br />
        ]<br />
    },<br />
    "message": "List Currency - Base EUR"<br />
    }<br />
<br />
3.  Get single currency code<br />
    GET to : http://localhost:8000/api/currency/{code}<br />
    example "USD" : http://localhost:8000/api/currency/USD<br />
    TOKEN = "1|76dl6lLeXXiwz7tHh65URvnlh6LGh16SraQFfHsV"<br />
<br />
    example return param:<br />
    {<br />
    "success": true,<br />
    "data": {<br />
        "data": [<br />
            {<br />
                "code": "USD",<br />
                "name": "US dollar",<br />
                "rate": 1.0245,<br />
                "date": "2022-07-19"<br />
            }<br />
        ]<br />
    },<br />
    "message": "Currency Rate - Base EUR"<br />
    }<br />
    <br />
4.  Update or Create Currency<br />
    POST to : http://localhost:8000/api/createUpdate<br />
    TOKEN = "1|76dl6lLeXXiwz7tHh65URvnlh6LGh16SraQFfHsV"<br />
    JSON Param = {<br />
                    "code" : "IDR",<br />
                    "name" : "Indonesia Rupiah",<br />
                    "rate" : "15344.49",<br />
                    "date" : "2022-07-19"<br />
                }<br />
<br />
    example return param:<br />
    {<br />
    "success": true,<br />
    "data": {<br />
        "data": {<br />
            "code": "IDR",<br />
            "name": "Indonesia Rupiah",<br />
            "rate": "15344.49",<br />
            "date": "2022-07-19",<br />
            "updated_at": "2022-07-20T10:26:47.000000Z",<br />
            "created_at": "2022-07-20T10:26:47.000000Z",<br />
            "id": 5<br />
        }<br />
    },<br />
    "message": "Create or Update Rate"<br />
    }<br />
<br />