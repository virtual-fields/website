@extends('mail.structure')
@section('mail_body')

<tr>
	<td style="padding: 10px 30px;">
			
		<p style="font-size: 18px; color: #2d323b; line-height: 30px; margin-bottom: 30px; font-family: Arial, Helvetica, sans-serif">Hi <?php if(!empty($name)) echo ucfirst($name); ?>,</p>
		<?php 	
			if(!empty($mail_content)){
				
				echo '<p style="font-size: 18px; color: #2d323b; line-height: 30px; margin-bottom: 30px; font-family: Arial, Helvetica, sans-serif">'.$mail_content.'</p>';
			}else{
				?>
				<p style="font-size: 18px; color: #2d323b; line-height: 30px; margin-bottom: 30px; font-family: Arial, Helvetica, sans-serif">Please click below link to verify your email. </p>
				<?php 
			}
		?>
	</td>
</tr>


<tr>
	<td style="padding: 0 30px; height: 100px; text-align: center;">
		<a href="{{ url('verify/?token=') }}{{ $token }}" target="_blank" style=" font-family: Arial, Helvetica, sans-serif; font-weight:bold;background-color: #2793ff; padding: 10px 20px; text-decoration: none; color: #2d323b; text-align: center; max-width: 300px; border-radius: 5px; -webkit-border-radius: 5px;">Verify Your Email</a>
	</td>
</tr>

@endsection
