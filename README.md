Laravel Currency - with bearer Authentication

API Usage:
1.  Login first
    POST to: http://localhost:8000/api/login
    example post param: email = agus.supriono@gmail.com
                        password = agus123

    example return param: 
    {
	"success": true,
	"data": {
		"id": 1,
		"fullName": "Agus Supriono",
		"token": "1|76dl6lLeXXiwz7tHh65URvnlh6LGh16SraQFfHsV"
	},
	"message": "User signed in"
    }
 
    use token in data return value for bearer authentication

2.  List Currencied
    GET to : http://localhost:8000/api/currencies
    TOKEN = "1|76dl6lLeXXiwz7tHh65URvnlh6LGh16SraQFfHsV"

    example return param:
    {
	"success": true,
	"data": {
		"data": [
			{
				"code": "EUR",
				"name": "Euro"
			},
			{
				"code": "USD",
				"name": "US dollar"
			},
			{
				"code": "JPY",
				"name": "Japanese yen"
			},
			{
				"code": "IDR",
				"name": "Indonesia Rupiah"
			}
		]
	},
	"message": "List Currency - Base EUR"
    }

3.  Get single currency code
    GET to : http://localhost:8000/api/currency/{code}
    example "USD" : http://localhost:8000/api/currency/USD
    TOKEN = "1|76dl6lLeXXiwz7tHh65URvnlh6LGh16SraQFfHsV"

    example return param:
    {
	"success": true,
	"data": {
		"data": [
			{
				"code": "USD",
				"name": "US dollar",
				"rate": 1.0245,
				"date": "2022-07-19"
			}
		]
	},
	"message": "Currency Rate - Base EUR"
    }
    
4.  Update or Create Currency
    POST to : http://localhost:8000/api/createUpdate
    TOKEN = "1|76dl6lLeXXiwz7tHh65URvnlh6LGh16SraQFfHsV"
    JSON Param = {
                    "code" : "IDR",
                    "name" : "Indonesia Rupiah",
                    "rate" : "15344.49",
                    "date" : "2022-07-19"
                }

    example return param:
    {
	"success": true,
	"data": {
		"data": {
			"code": "IDR",
			"name": "Indonesia Rupiah",
			"rate": "15344.49",
			"date": "2022-07-19",
			"updated_at": "2022-07-20T10:26:47.000000Z",
			"created_at": "2022-07-20T10:26:47.000000Z",
			"id": 5
		}
	},
	"message": "Create or Update Rate"
    }