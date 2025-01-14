<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grade</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="m-10 text-xl">
        Grade
    </div>

    <div class="m-2 grid grid-cols-3 gap-3">
        <div class="bg-red-100 p-3 rounded-xl">
            Content
        </div>
        <div class="bg-red-100 p-3 rounded-xl">
            Content
        </div>
        <div class="row-span-2 bg-red-100 p-3 rounded-xl">
            <div class="grid grid-row gap-3">
                <div>
                    filter
                </div>

                <div>
                    year
                </div>
            </div>
        </div>

        <div class="col-span-2 bg-red-100 p-3 h-64 rounded-xl">
            Table
        </div>
    </div>


</body>
</html>
