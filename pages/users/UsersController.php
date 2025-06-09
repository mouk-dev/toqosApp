 <?php
    class UsersController
    {
        /**
         * Function to connect to the database
         * @return PDO
         */
        private function connectDb()
        {
            try {
                $db = new PDO("mysql:host=localhost;dbname=db_niyi", "mouksite", "", [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
                return $db;
            } catch (PDOException $error) {
                error_log("Database connection error: " . $error->getMessage());
                die("Erreur de connexion à la base de données.");
            }
        }

        /**
         * Function to add a new user.
         * @param string $name
         * @param float $email
         * @param float $password
         * @param string $role
         * @param string $date
         */
        public function addUser($name, $email, $password, $role, $date)
        {
            $db = $this->connectDb();
            $query = "INSERT INTO users (name, email, password, role, user_signup_date) VALUES (:name, :email, :password, :role, :user_signup_date)";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role' => $role,
                'user_signup_date' => $date
            ]);
        }

        /**
         * Function to update an user by ID.
         * @param int $id
         * @param string $role
         */
        public function updateUser($id, $role)
        {
            $db = $this->connectDb();
            $query = "UPDATE users SET role = :role WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'id' => $id,
                'role' => $role
            ]);
        }

        /**
         * Function to delete an user by ID.
         * @param int $id
         */
        public function deleteUser($id)
        {
            $db = $this->connectDb();
            $query = "DELETE FROM users WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute(['id' => $id]);
        }

        /**
         * Function to select all users.
         * @return array
         */
        public function getAllUsers()
        {
            $db = $this->connectDb();
            $query = "SELECT * FROM users";
            $stmt = $db->query($query);
            return $stmt->fetchAll();
        }

        /**
         * Function to select user by id.
         * @return array
         */
        public function getUserById($id)
        {
            $db = $this->connectDb();
            $query = "SELECT * FROM users WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        }

        /**
         * Function to select users by role.
         * @param string $role
         * @return array
         */
        public function getUsersByRole($role)
        {
            $db = $this->connectDb();
            $query = "SELECT * FROM users WHERE role = :role";
            $stmt = $db->prepare($query);
            $stmt->execute(['role' => $role]);
            return $stmt->fetchAll();
        }
    }
?>
