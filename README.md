# Pawstercare

A comprehensive pet adoption and animal welfare management system built with PHP and CodeIgniter framework. This application facilitates pet adoption processes, tracks animal welfare reports, and manages user interactions in the pet care community.

## Features

### Pet Management
- **Pet Listing**: Browse available pets for adoption with detailed profiles
- **Pet Registration**: Add new pets to the adoption system
- **Adoption Process**: Complete adoption workflow with approval system
- **Pet Information**: Detailed pet profiles with photos and characteristics

### Animal Welfare & Reporting
- **Cruelty Reports**: Report animal cruelty incidents with documentation
- **Investigation Tracking**: Monitor and manage welfare investigation cases
- **Evidence Management**: Store photos and videos of welfare cases

### User Management
- **User Registration & Login**: Secure user authentication system
- **Password Recovery**: Email-based password recovery system
- **User Profiles**: Manage adopter information and history
- **Role-based Access**: Different access levels for users and administrators

### Administrative Features
- **Dashboard**: Comprehensive overview of system activities
- **User Management**: Manage user accounts and permissions
- **Report Management**: Review and process animal welfare reports
- **Adoption Approvals**: Review and approve/deny adoption requests
- **Analytics**: Track adoption trends and system usage

## Technology Stack

- **Backend**: PHP with CodeIgniter 3 framework
- **Frontend**: HTML, CSS, JavaScript
- **Database**: MySQL (database configuration required)
- **Server**: Apache/Nginx compatible

## Project Structure

```
pawstercare_v6.0/
├── application/           # CodeIgniter application files
│   ├── controllers/       # Application controllers
│   ├── models/           # Database models
│   ├── views/            # View templates
│   ├── config/           # Configuration files
│   └── ...
├── assets/               # Static assets (CSS, JS, images)
├── pets/                 # Pet photos and media
├── petcruelty/          # Animal welfare case media
├── system/              # CodeIgniter core files
└── index.php            # Application entry point
```

## Installation

1. **Clone the repository**
   ```bash
   git clone [repository-url]
   cd pawstercare_v6.0
   ```

2. **Configure Database**
   - Create a MySQL database
   - Update database configuration in `application/config/database.php`

3. **Configure Base URL**
   - Update the base URL in `application/config/config.php`

4. **Set File Permissions**
   - Ensure write permissions for `application/logs/` and `application/cache/`

5. **Web Server Setup**
   - Point your web server document root to the project directory
   - Ensure PHP and MySQL are properly configured

## Usage

1. **Access the Application**
   - Navigate to your configured base URL
   - Register a new account or login with existing credentials

2. **Pet Adoption**
   - Browse available pets
   - Submit adoption requests
   - Track application status

3. **Report Animal Welfare Issues**
   - Submit cruelty reports with evidence
   - Track case progress
   - View investigation outcomes

## Security Features

- Input validation and sanitization
- Password encryption
- Session management
- SQL injection prevention
- Cross-site scripting (XSS) protection

## Contributing

This is a freelance project for pet welfare management. For issues or feature requests, please contact the development team.

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Version

Current version: 6.0

---

**Note**: This application is designed to support animal welfare organizations and pet adoption agencies in managing their operations effectively while ensuring the safety and wellbeing of animals.
