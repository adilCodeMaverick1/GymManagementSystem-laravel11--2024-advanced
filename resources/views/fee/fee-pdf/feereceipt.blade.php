<!DOCTYPE html>
<html>
<head>
    <title>Fee Receipt</title>
    <style>
        /* Define your styles here */
    </style>
</head>
<body>
    <h1>Fee Receipt</h1>
    <p><strong>Member:</strong> {{ $fee->member->name }}</p>
    <p><strong>Membership:</strong> {{ $fee->membership->type }}</p>
    <p><strong>Collected By:</strong> {{ $fee->user->name }}</p>
    <p><strong>Month:</strong> {{ date('F', mktime(0, 0, 0, $fee->month, 1)) }}</p>
    <p><strong>Voucher Number:</strong> {{ $fee->voucher_number }}</p>
    <p><strong>Amount:</strong> {{ $fee->amount }}</p>
</body>
</html>
