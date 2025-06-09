 <?php
    class MomoController
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
         * Function to add a new amount.
         * @param string $type
         * @param float $amount
         * @param string $statut
         * @param string $date
         */
        public function addAmount($type, $amount, $statut, $date)
        {
            $db = $this->connectDb();
            $query = "INSERT INTO momo (type, amount, statut, date) VALUES (:type, :amount, :statut, :date)";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'type' => $type,
                'amount' => $amount,
                'statut' => $statut,
                'date' => $date
            ]);
        }

        /**
         * Function to update an amount by ID.
         * @param int $id
         * @param string $type
         * @param float $amount
         * @param string $statut
         * @param string $date
         */
        public function updateAmount($id, $type, $amount, $statut, $date)
        {
            $db = $this->connectDb();
            $query = "UPDATE momo SET type = :type, amount = :amount, statut = :statut, date = :date WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'id' => $id,
                'type' => $type,
                'amount' => $amount,
                'statut' => $statut,
                'date' => $date
            ]);
        }

        /**
         * Function to delete an amount by ID.
         * @param int $id
         */
        public function deleteAmount($id)
        {
            $db = $this->connectDb();
            $query = "DELETE FROM momo WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute(['id' => $id]);
        }

        /**
         * Function to select all amounts.
         * @return array
         */
        public function getAllAmounts()
        {
            $db = $this->connectDb();
            $query = "SELECT * FROM momo";
            $stmt = $db->query($query);
            return $stmt->fetchAll();
        }

        /**
         * Function to select amount by id.
         * @return array
         */
        public function getAmountById($id)
        {
            $db = $this->connectDb();
            $query = "SELECT * FROM momo WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        }

        /**
         * Function to select amounts by statut.
         * @param string $statut
         * @return array
         */
        public function getAmountsByStatut($statut)
        {
            $db = $this->connectDb();
            $query = "SELECT * FROM momo WHERE statut = :statut";
            $stmt = $db->prepare($query);
            $stmt->execute(['statut' => $statut]);
            return $stmt->fetchAll();
        }

        /**
         * Function to select amounts by date.
         * @param string $date
         * @return array
         */
        public function getAmountsByDate($date)
        {
            $db = $this->connectDb();
            $query = "SELECT * FROM momo WHERE date = :date";
            $stmt = $db->prepare($query);
            $stmt->execute(['date' => $date]);
            return $stmt->fetchAll();
        }

        /**
         * Function to select amounts by type.
         * @param string $type
         * @return array
         */
        public function getAmountsByType($type)
        {
            $db = $this->connectDb();
            $query = "SELECT * FROM momo WHERE type = :type";
            $stmt = $db->prepare($query);
            $stmt->execute(['type' => $type]);
            return $stmt->fetchAll();
        }

        /**
         * Function to calculate totals by type and statut.
         * @param string $statut
         * @return array
         */
        public function getTotalsByTypeAndStatut($statut)
        {
            $db = $this->connectDb();
            $query = "SELECT type, SUM(amount) as total FROM momo WHERE statut = :statut GROUP BY type";
            $stmt = $db->prepare($query);
            $stmt->execute(['statut' => $statut]);
            return $stmt->fetchAll();
        }

        /**
         * Function to calculate the total amount by statut (entrants or sortants).
         * @param string $statut
         * @return float
         */
        public function getTotalByStatut($statut)
        {
            $db = $this->connectDb();
            $query = "SELECT SUM(amount) as total FROM momo WHERE statut = :statut";
            $stmt = $db->prepare($query);
            $stmt->execute(['statut' => $statut]);
            $result = $stmt->fetch();
            return $result['total'] ?? 0;
        }

        /**
         * Function to calculate overall totals (entrants and sortants).
         * @return array
         */
        public function getGeneralTotal($statut)
        {
            $db = $this->connectDb();
            $query = "SELECT SUM(amount) as total FROM momo WHERE statut = :statut";
            $stmt = $db->prepare($query);
            $stmt->execute(['statut' => $statut]);
            $result = $stmt->fetch();
            return $result['total'] ?? 0;
        }

        /**
         * Function to calculate overall totals for both 'Entrant' and 'Sortant'.
         * @return array
         */
        public function getOverallTotals()
        {
            $db = $this->connectDb();
            $query = "SELECT 
                        SUM(CASE WHEN statut = 'Entrant' THEN amount ELSE 0 END) as total_entrant,
                        SUM(CASE WHEN statut = 'Sortant' THEN amount ELSE 0 END) as total_sortant
                      FROM momo";
            $stmt = $db->query($query);
            return $stmt->fetch();
        }

        /**
         * Function to get filter amounts.
         * @return array
         */
        public function getFilteredAmounts($statut = null, $type = null, $date = null)
        {
            $db = $this->connectDb();
            $conditions = [];
            $params = [];

            if (!empty($statut)) {
                $conditions[] = "statut = :statut";
                $params['statut'] = $statut;
            }

            if (!empty($type)) {
                $conditions[] = "type = :type";
                $params['type'] = $type;
            }

            if (!empty($date)) {
                $conditions[] = "DATE(date) = :date";
                $params['date'] = $date;
            }

            $sql = "SELECT * FROM momo";
            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }

            $sql .= " ORDER BY date DESC";

            $stmt = $db->prepare($sql);
            $stmt->execute($params);

            return $stmt->fetchAll();
        }
    }
?>
