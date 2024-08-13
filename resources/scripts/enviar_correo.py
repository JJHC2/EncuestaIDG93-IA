from flask import Flask, request, jsonify
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

app = Flask(__name__)

def send_email(to_email, token):
    smtp_server = 'smtp.gmail.com'
    smtp_port = 587
    smtp_user = 'al222110834@gmail.com'
    smtp_password = 'nyks cfuo qgjv iylg'

    msg = MIMEMultipart()
    msg['Subject'] = 'Restablecimiento de Contraseña'
    msg['From'] = smtp_user
    msg['To'] = to_email

    html_content = f"""
    <html>
    <head>
        <style>
            body {{
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                color: #333;
                margin: 0;
                padding: 20px;
            }}
            .container {{
                max-width: 600px;
                margin: auto;
                background: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }}
            .header {{
                text-align: center;
                margin-bottom: 20px;
            }}
            .header img {{
                max-width: 150px;
            }}
            .content {{
                text-align: center;
            }}
            .footer {{
                text-align: center;
                margin-top: 20px;
                font-size: 12px;
                color: #888;
            }}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToMKJ59_iKwbmO1C6kKRXAO2cv-du7l1YIkA&s" alt="UTVT Logo">
            </div>
            <div class="content">
                <h1>Restablecimiento de Contraseña</h1>
                <p>Hola,</p>
                <p>Haz solicitado restablecer tu contraseña. Por favor, haz clic en el siguiente enlace para proceder:</p>
                <p><a href="http://127.0.0.1:8000/password/reset?token={token}" style="background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Restablecer Contraseña</a></p>
                <p>Si no has solicitado este cambio, por favor ignora este correo.</p>
            </div>
            <div class="footer">
                <p>&copy; 2024 UTVT. Todos los derechos reservados.</p>
            </div>
        </div>
    </body>
    </html>
    """

    msg.attach(MIMEText(html_content, 'html'))

    try:
        with smtplib.SMTP(smtp_server, smtp_port) as server:
            server.starttls()
            server.login(smtp_user, smtp_password)
            server.sendmail(msg['From'], [msg['To']], msg.as_string())
        return 'Correo de recuperación enviado', 200
    except smtplib.SMTPException as e:
        return f'Error al enviar el correo: {str(e)}', 500

@app.route('/send-password-reset-email', methods=['POST'])
def send_password_reset_email():
    data = request.json
    email = data.get('email')
    token = data.get('token')

    if email and token:
        result, status = send_email(email, token)
        return jsonify({'message': result}), status
    return jsonify({'message': 'Email o token no proporcionado'}), 400

if __name__ == '__main__':
    app.run(debug=True)
