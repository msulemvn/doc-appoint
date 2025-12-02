# Doctor Appointment API

REST API for managing doctor appointments with JWT authentication, role-based access control, and automated API documentation.

## Tech Stack

- Laravel 12
- PHP 8.2+
- MySQL
- JWT Authentication (tymon/jwt-auth)
- Swagger/OpenAPI (L5-Swagger)
- Vite + Tailwind CSS 4

## Features

- User authentication (register, login, logout, token refresh)
- Role-based access (doctor/patient)
- Profile management
- Doctor listings with availability filtering
- Appointment booking and management
- Status transitions with authorization policies
- Form Request validation with integrated policy checks
- Automated API documentation with Swagger UI

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js & npm
- MySQL 5.7+ or 8.0+

## Installation

```bash
# Clone repository
git clone https://github.com/msulemvn/doc-appoint-api.git
cd doc-appoint-api

# Install dependencies and setup
composer setup
```

The `composer setup` command will:
- Install PHP dependencies
- Create `.env` file from `.env.example`
- Generate application key
- Run database migrations
- Install frontend dependencies
- Build assets

## Configuration

### Database Setup

Create a MySQL database:
```sql
CREATE DATABASE doc_appoint CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Update `.env` with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=doc_appoint
DB_USERNAME=root
DB_PASSWORD=your_password
```

### JWT Configuration

Generate JWT secret key:
```bash
php artisan jwt:secret
```

### Swagger Configuration (Optional)

Update `.env` for API documentation:
```env
L5_SWAGGER_GENERATE_ALWAYS=true
L5_SWAGGER_CONST_HOST=http://127.0.0.1:8000
```

## Development

Start all services (API server, queue worker, logs, Vite):
```bash
composer dev
```

This runs concurrently:
- API server on `http://127.0.0.1:8000`
- Queue worker
- Log viewer
- Vite dev server

Or run services individually:
```bash
php artisan serve
php artisan queue:listen
npm run dev
```

## Testing

Run tests:
```bash
composer test
```

Run specific test suite:
```bash
php artisan test --filter=AuthTest
```

## API Documentation

Interactive API documentation is available at:
```
http://127.0.0.1:8000/api/documentation
```

## API Endpoints

### Authentication
| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| POST | `/api/register` | Register new user | No |
| POST | `/api/login` | User login | No |
| POST | `/api/logout` | User logout | Yes |
| POST | `/api/refresh` | Refresh JWT token | Yes |
| GET | `/api/profile` | Get user profile | Yes |
| PUT | `/api/profile` | Update user profile | Yes |

### Doctors
| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| GET | `/api/doctors/available` | List available doctors | No |
| GET | `/api/doctors/{id}` | Get doctor details | No |

### Appointments
| Method | Endpoint | Description | Auth Required |
|--------|----------|-------------|---------------|
| GET | `/api/appointments` | List user appointments | Yes |
| POST | `/api/appointments` | Create appointment | Yes |
| GET | `/api/appointments/{id}` | Get appointment details | Yes |
| PUT | `/api/appointments/{id}/status` | Update appointment status | Yes |

## Architecture

### Design Patterns

- **Action Pattern**: Business logic encapsulated in single-responsibility action classes
- **Form Requests**: Validation with integrated policy authorization
- **Policy-Based Authorization**: Fine-grained access control for resources
- **String-Backed Enums**: Type-safe status and role definitions
- **API Resources**: Consistent JSON response formatting

### Project Structure

```
app/
├── Actions/          # Business logic actions
├── Http/
│   ├── Controllers/  # API controllers
│   ├── Requests/     # Form request classes
│   └── Resources/    # API response transformers
├── Models/           # Eloquent models
├── Policies/         # Authorization policies
└── Enums/            # Enums for status/roles
```

## Code Quality

### Code Style
```bash
# Format code with Laravel Pint
./vendor/bin/pint
```

### Static Analysis
```bash
# Run PHPStan
./vendor/bin/phpstan analyse
```

### Refactoring
```bash
# Run Rector
./vendor/bin/rector process
```

## Deployment

### Build for Production
```bash
composer install --no-dev --optimize-autoloader
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Environment Variables
Ensure these are set in production:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
```

## License

MIT
