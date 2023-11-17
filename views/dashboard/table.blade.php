<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auth Manager</title>
    <link href="/assets/bootstrap.css" rel="stylesheet">
    <link href="/assets/jquery-confirm.css" rel="stylesheet">
    <link href="/assets/dashboard.css" rel="stylesheet">
    <link rel="icon" href="/assets/icon.png" type="image/x-icon">

</head>
<body>

<div class="container">

    <div class="alert alert-info mt-4">
        <button class="btn btn-primary new_credential_btn">
            <img class="mx-3" src="data:image/png;base64,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">
            Create New
        </button>
    </div>

    <table class="table table-bordered credential_table table-striped table-responsive">
        <tbody>
        <tr class="table-header">
            <td class="table-header">ID</td>
            <td class="table-header">Name</td>
            <td class="table-header">IP</td>
            <td class="table-header">Host</td>
            <td class="table-header">Username</td>
            <td class="table-header">Password</td>
            <td class="table-header">Operation</td>
        </tr>

        <tr class="credential_item credential_item_template" style="display: none">
            <td class="credential_id"></td>
            <td class="credential_name"></td>
            <td class="credential_ip"></td>
            <td class="credential_host"></td>
            <td class="credential_username"></td>
            <td class="credential_password"></td>
            <td class="credential_operation text-center">
                <img class="operation_btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAACXBIWXMAAAsTAAALEwEAmpwYAAADVklEQVR4nO2WX0hTURzH70PRQ3+eCgny3v1rc/ds6ra73avRZjnLEp37o+ZURGYL3RQ1RaWSTKjQBLOoIOZDpEG9KfmeUC7opSxKsagg/0xIZhiI2IlzS5vhxbadhQ/7wped89s5v/O5h3vhSxBxxRVX7CUSgSJSDPyUiH6BjMaJImUhsVVEioE/ISF55+p8H03vQrX/DiIlk7QGhcavPZj6MdQyier7v9RYhWYU9YgJ3H65fC+j0EyP2V0wWOKNyGN2F0Q9UC8sUDqdbjsj1/Sjp5dL1AsNXNaKz2yD4Xj4pBOOOyr5X+SznHlFKVXPo56MXHOfMJm2RQxIioG9njUvzjs9Ed9aUMCoZx2buUhJgC1iQIpSag4n6b7ezbT9CPfmfJsY9US9KYpOJaKRSARSSBHwVRoty33FXojDLmPeMuqJekcFF3KTJy7mlAW/td2BOHwhpzRIUXQ2gUsHxEBfnWmdCz2kK8sBr5py4avqdn4+23IdXjLlwQ5TLgy09vK1l552fs21LMc6wKqj1rlEiYrBBkiSaklhWvZM6CG+TBv/ovdZXfz8ufscfGop543GqPbA4ebXoLWhewvSjs+QZLIYG6BMJttzTGucXQdotvFfoy+/gp/73efhaH45bzRGtUBNx6815vWAZq1xVqFQ7CZwKl3FhQ044HBvCMipuACBWwbATuG6QQNgp7AD6pT6zwttt8MC9OVXbAjIKPWfsAPqAftm5vfXGQ3gdGsvNNCG19gBOcCNvGvojBrwbX0n5AD3BDsgq2IfPfO0Rw04Wt0OWcA+xA7IKA29w66WqAEfu1qgntb3YAdUSlKaBsrqowbsL62HCmlqI3ZAUgTKbtrPLG0GOFlwGr6vvSwIeMPuXiLFqlLsgH8HBiHAYIkXLjT3CAJiDwpCgUEI8MupKjjV0CUIiD0ohAaGovQ/gSHSd7AQd1AQCgydGXk8zJCzlp9P1F2B97IcvNEY1QaLvdBvKYddGZbYBoWNAgPKgUPOWrjQdmvt8BFXM+/VOfpv0FkDxzwdazXUg4iVGFo/8aGpO+IkPdnYDRnaMB4zQLkk5RAD2GmXMS9QdcQ6F47RHj1gpxRSkE7EUjKZbIdYrEompWpdOEZ70N6YwsUVV1zE1tNPWocbpleq1ycAAAAASUVORK5CYII=">
                <img class="operation_btn" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAACXBIWXMAAAsTAAALEwEAmpwYAAABx0lEQVR4nO3UXUvCUBgH8NGNEEEZRFd9CTO87CYIguirpAO9k/oCOu/yJYguTkVQq7TUuaXUtI26KOoL5NuNEUkvHi98YgODinLTnSm1P/zvDuPHc54zirJi5R+nsrzsLHk8qaLbvUANWlLx1HTR662WaRrKHg8u0fQiNSg5zOQdrHD+cJQUbope72sbORCThDA1E8+kZFYQQWn8mL9qI0s0ne74gaCEA4yEd0l0jz/mcGQEv8QmmvtC7ukDmRSu732+aoWmZzoDZXzHyBiMLspewFt0HGCNUltfn4I9PldXkbz4mE6knZqugAQQfcG1+xydbCa4k8tDTuw8OVJA9ANOaTMy3IQw5dKMMxqIfsE1oqPAciyvC2ckEHXAbZ+egfJw+gJEWnDK2X4AkVZcP4BID85sINKLMxOIusGZBUTd4swAol5wpIE942SCwI38LTSi9h9wY7CVFbWtCClgQVyBMj8LrchQd5MjDSyezQHkbJ+QunHEgGINgn4HtLK2D2QjZtePIwUM7myCa34JGL9DnWRBXFV3UjeOFDDEJlRkKF/rDmXWb8aQShYQWxP8FmsH5b/+SBgJHyhIUyrhgG6gFSuUuXkHgvgPhMojknwAAAAASUVORK5CYII=">
            </td>
        </tr>

        </tbody>
    </table>

    <div class="row justify-content-center text-center table_loading">
        <div class="spinner-border text-success" role="status">
            <span class="sr-only"></span>
        </div>
        <span class="mx-4 text-success">Loading credentials ...</span>
    </div>


    <div style="display: none" class="credential_form">
        <form class="border" style="padding: 30px">
            <div class="mb-3">
                <label for="nameInput" class="form-label">Name</label>
                <input type="text" class="form-control" id="nameInput" name="name" placeholder="Enter name">
            </div>
            <div class="mb-3">
                <label for="ipInput" class="form-label">IP</label>
                <input type="text" class="form-control" id="ipInput" name="ip" placeholder="Enter IP address">
            </div>
            <div class="mb-3">
                <label for="hostInput" class="form-label">Host</label>
                <input type="text" class="form-control" id="hostInput" name="host" placeholder="Enter Host address">
            </div>
            <div class="mb-3">
                <label for="usernameInput" class="form-label">Username</label>
                <input type="text" class="form-control" id="usernameInput" name="username" placeholder="Enter username">
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Enter password">
            </div>
        </form>
    </div>




    <div class="empty_credential_alert alert alert-warning text-center" style="display: none">There is not credentials</div>
</div>

<script src="/assets/bootstrap.js"></script>
<script src="/assets/jquery.js"></script>
<script src="/assets/axios.js"></script>
<script src="/assets/jquery-confirm.js"></script>
<script src="/assets/application.js"></script>
</body>
</html>