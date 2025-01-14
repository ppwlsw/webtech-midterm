<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="m-10 text-xl">
        Document
    </div>

    <div class="p-4 w-64 bg-black opacity-40 text-white mx-10 mt-5 mb-3 rounded-xl">
        Search
    </div>

    <div class="p-4 w-full bg-red-100 text-white mx-10 mt-5 mb-3 rounded-xl">
        <div class="grid grid-rows gap-4">
            <div class="p-2 bg-white w-96 text-black rounded-xl">
                Content
            </div>
            <div class="p-2 bg-white w-96 text-black rounded-xl">
                Content
            </div>
            <div class="p-2 bg-white w-96 text-black rounded-xl">
                Content
            </div>
        </div>

    </div>


</body>
</html>
