<!DOCTYPE html>
<html>
<head>
    <title>Kustomisasi Radio Button</title>
    <style>
        /* Menghilangkan default styling */
        input[type="radio"] {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            border: 2px solid #3498db;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            outline: none;
            cursor: pointer;
        }

        /* Kustomisasi saat radio button tidak di-check */
        input[type="radio"]:before {
            content: "";
            display: block;
            width: 10px;
            height: 10px;
            margin: 4px;
            border-radius: 50%;
            background-color: white;
        }

        /* Kustomisasi saat radio button di-check */
        input[type="radio"]:checked:before {
            background-color: #3498db;
        }

        /* Kustomisasi saat radio button didisable */
        input[type="radio"]:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* Style untuk label radio button */
        label {
            margin-right: 15px; /* Atur jarak antara radio button dan label */
        }
    </style>
</head>
<body>
    <h3>Pilih warna favorit Anda:</h3>
    <div>
        <input type="radio" id="color-red" name="color" value="red">
        <label for="color-red">Merah</label>

        <input type="radio" id="color-blue" name="color" value="blue">
        <label for="color-blue">Biru</label>

        <input type="radio" id="color-green" name="color" value="green">
        <label for="color-green">Hijau</label>
    </div>
</body>
</html>
