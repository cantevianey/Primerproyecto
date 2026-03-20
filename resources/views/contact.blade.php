<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - {{ config('app.name') }}</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <style>
        body { background-color: #f8f9fa; }
        .contact-container { max-width: 600px; margin: 50px auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .btn-send { background-color: #0d6efd; border: none; padding: 10px 20px; transition: 0.3s; }
        .btn-send:hover { background-color: #0b5ed7; transform: translateY(-2px); }
    </style>
</head>
<body>

    <div class="container">
        <div class="contact-container">
            <div class="text-center mb-4">
                <i class="fas fa-paper-plane fa-3x text-primary mb-3"></i>
                <h2 class="fw-bold">Ponte en contacto</h2>
                <p class="text-muted">Estamos aquí para ayudarte. Envíanos un mensaje.</p>
            </div>

            <form action="#" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre Completo</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Tu nombre..." required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="¿En qué podemos ayudarte?" required></textarea>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-send">
                        <i class="fas fa-paper-plane me-2"></i> Enviar Mensaje
                    </button>
                    <a href="{{ url('/') }}" class="btn btn-link text-decoration-none text-muted">
                        <i class="fas fa-arrow-left me-1"></i> Volver al inicio
                    </a>
                </div>
            </form>
        </div>
    </div>

    <footer class="text-center mt-5 pb-4">
        <div class="text-muted small">
            <i class="fa-brands fa-facebook mx-2"></i>
            <i class="fa-brands fa-instagram mx-2"></i>
            <i class="fa-brands fa-whatsapp mx-2"></i>
            <p class="mt-2">&copy; 2026 Vianey Cante - Mérida, Yucatán</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>