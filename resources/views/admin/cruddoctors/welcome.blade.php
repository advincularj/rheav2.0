<h3>Hi {{ $user->first_name }} {{ $user->last_name }},</h3>
<p>We've set up an account for you so that you can see your activities as a doctor. Before you can do this, you'll need to set a password, please use the link below.</p>

<p><a href="{{ url('password/reset/' . $token)}}">Set Password</a></p>