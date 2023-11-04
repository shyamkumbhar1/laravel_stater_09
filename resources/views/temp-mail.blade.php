<!DOCTYPE html>
<html>
<head>
	<title>Registration Confirmation</title>
</head>
<body>
	<p>Dear {{ $user['name'] }},</p>

	<p>Thank you for registering with PMHNP. We are excited to have you as a new member of our community.</p>
	
	<p>Please find below the details of your registration:</p>

	<p><strong>Username:</strong> {{ $user['name'] }}</p>
	<p><strong>Email Address:</strong> {{ $user['email'] }}</p>
	{{-- <p><strong>Date of Registration:</strong> [Date/Time]</p> --}}

	{{-- <p>To complete your subscription, please follow the steps below:</p> --}}
	
	{{-- <ol>
		<li>Purchase a plan: Visit our website <a href="www.pmhnp.com">www.pmhnp.com</a> and choose the plan that suits your needs.</li>
		<li>Register your account: After purchasing a plan, you will receive an email containing a registration link. Click on the link to register your account.</li>
		<li>Enjoy the benefits: Once your account is registered, you can access all the features and benefits of our platform.</li>
	</ol> --}}

	<p>If you have any questions or need assistance, please don't hesitate to contact our support team at <a href="mailto:support@pmhnp.com">support@pmhnp.com</a>.</p>

	<p>Best regards,<br>
	Support Pmhnp<br>
	PMHNP
</p>
</body>
</html>
