@extends('mail.structure')
@section('mail_body')

	<tr>
		<td style="padding: 10px 30px;">
				
			<p style="font-size: 18px; color: #4d4848; line-height: 30px; margin-bottom: 30px; font-family: Arial, Helvetica, sans-serif">Hi <?php if(!empty($name)) echo ucfirst($name); ?>,</p>
			<?php 	
				if(!empty($mail_content)){
					
					echo '<p style="font-size: 18px; color: #4d4848; line-height: 30px; margin-bottom: 30px; font-family: Arial, Helvetica, sans-serif">'.$mail_content.'</p>';
				}else{
					?>
					<p style="font-size: 18px; color: #4d4848; line-height: 30px; margin-bottom: 30px; font-family: Arial, Helvetica, sans-serif">Thank you for contact us. We'll get back to you soon.</p>
					<?php 
				}
			?>
		</td>
	</tr>
@endsection