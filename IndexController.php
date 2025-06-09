<?php
    class IndexController
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
         * Function to verify user email
         * @param string $email
         * @return array|null
         */
        public function verifyEmailUser(string $email): ?array
        {
            $db = $this->connectDb();
            $query = $db->prepare('SELECT * FROM users WHERE email = ?');
            $query->execute([$email]);
            $result = $query->fetch();
            return $result ? $result : null;
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
         * Function to update an user name by ID.
         * @param int $id
         * @param string $role
         */
        public function updateUserName($id, $name)
        {
            $db = $this->connectDb();
            $query = "UPDATE users SET name = :name WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'id' => $id,
                'name' => $name
            ]);
        }

        /**
         * Function to update an user email by ID.
         * @param int $id
         * @param string $role
         */
        public function updateUserEmail($id, $email)
        {
            $db = $this->connectDb();
            $query = "UPDATE users SET email = :email WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'id' => $id,
                'email' => $email
            ]);
        }

        /**
         * Function to update an user password by ID.
         * @param int $id
         * @param string $role
         */
        public function updateUserPassword($id, $password)
        {
            $db = $this->connectDb();
            $query = "UPDATE users SET password = :password WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'id' => $id,
                'password' => $password
            ]);
        }
    }
?>
