# Online Admission System

## Overview

The **Online Admission System** is a web-based application designed to streamline and automate the process of student admissions for educational institutions. This project allows administrators to manage the admission process online, making it easier for both students and administrators to handle the entire process efficiently.
![App Screenshot](https://github.com/iamvishveshs/iamvishveshs.github.io/blob/main/assets/png/oas.png?raw=true)

## Features

- **User Registration & Authentication:** 
  - Students can register and create their profiles.
  - Secure login and authentication system for students and administrators.

- **Application Submission:**
  - Students can fill out application forms online.
  - Upload necessary documents directly to the platform.
  
- **Application Tracking:**
  - Students can track the status of their applications in real time.
  
- **Admin Dashboard:**
  - View and manage all submitted applications.
  - Generate reports and statistics on admissions.

- **Responsive Design:**
  - Fully responsive design ensuring usability across all devices (desktops, tablets, mobile phones).

## Technologies Used

- **Frontend:**
  - HTML5, CSS3, and JavaScript for the user interface.
  - Bootstrap for responsive design.
  
- **Backend:**
  - PHP for server-side scripting.
  - MySQL for the database to manage application data.
  
- **Other Tools:**
  - AJAX for asynchronous operations and a smoother user experience.
  - jQuery for enhanced interactivity and user experience.

## Installation & Setup

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/iamvishveshs/online-admission-system.git

2. **Database Setup:**
   - Import the `admission_system.sql` file into your MySQL database.
   - Configure your database settings in the `config.php` file.
   - **Important:** Update the `db.php` file located in the `main` and `razorpay` directories with your database configuration:
     - **Hostname:** `localhost`
     - **Username:** `root`
     - **Password:** `''` (empty)
     - **Database Name:** `onlineadmissionsystem`

3. **Razorpay Configuration:**
   - **API Keys:** Update the `config.php` file in the `razorpay` directory with your Razorpay API credentials:
     - `$keyId` 
     - `$keySecret`
   - **Merchant Order ID:** Modify the `merchant_order_id` in the `pay.php` file within the `razorpay` directory according to your requirements.

4. **Run the Application:**
   - Deploy the project on your local server (e.g., XAMPP, WAMP).
   - Access the application via `http://localhost/online-admission-system/`.


## Test Payment Details for Payment Gateway

### Netbanking
- **Bank Selection:** You can select any of the listed banks. After choosing a bank, Razorpay will redirect you to a mock page where you can simulate a successful or failed payment. Since this is in Test Mode, you won't be redirected to the actual bank login portals.
- **Supported Banks:** [Check the list of supported banks](https://razorpay.com/docs/payments/payment-gateway/ios-integration/custom/test-integration/).

### UPI
- **Test UPI IDs:**
  - `success@razorpay`: Use this to simulate a successful payment.
  - `failure@razorpay`: Use this to simulate a failed payment.
- **Note:** UPI payments should be tested in Live Mode.
- **Supported UPI Flows:** [Check the list of supported UPI flows](https://razorpay.com/docs/payments/payment-gateway/ios-integration/custom/test-integration/).

### Cards
- **Test Card Details:**
  - Use any valid expiration date in the future in the MM/YY format.
  - Use any random CVV to create a successful payment.
  
| Card Network  | Domestic / International | Card Number        |
|---------------|--------------------------|--------------------|
| Mastercard    | Domestic                  | 5267 3181 8797 5449|
| Visa          | Domestic                  | 4111 1111 1111 1111|
| Mastercard    | International             | 5555 5555 5555 4444|
|               |                            | 5105 1051 0510 5100|
| Visa          | International             | 4012 8888 8888 1881|
|               |                            | 5104 0600 0000 0008|

- **Supported Card Networks:** [Check the list of supported card networks](https://razorpay.com/docs/payments/payment-gateway/ios-integration/custom/test-integration/).

### Wallet
- **Wallet Selection:** You can select any of the listed wallets. After choosing a wallet, Razorpay will redirect you to a mock page where you can simulate a successful or failed payment. Since this is in Test Mode, you won't be redirected to the actual wallet login portals.
- **Supported Wallets:** [Check the list of supported wallets](https://razorpay.com/docs/payments/payment-gateway/ios-integration/custom/test-integration/).


## Advantages

- **Efficiency:** 
  - Reduces paperwork and manual errors in the admission process.
  - Speeds up the process of application evaluation and communication.
  
- **Accessibility:**
  - Students can apply from anywhere, at any time, without needing to visit the institution.
  
- **Data Management:**
  - Centralized data management for all applications, making it easier for admins to access and process information.

- **Cost-effective:**
  - Reduces operational costs by minimizing the need for physical infrastructure and personnel.

## Contributing

Contributions are welcome! If you would like to improve this project, feel free to fork the repository and submit a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact

For any questions or suggestions, feel free to contact me:

- GitHub: [iamvishveshs](https://github.com/iamvishveshs)
