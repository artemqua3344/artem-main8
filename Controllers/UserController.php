<?php

    namespace Controllers;

    use Controllers\Controller;
    use Models\User;

    class UserController extends Controller
    {
        /**
         * @var User
         */
        private $user;

        /**
         *
         * @var int
         */
        private $id = 0;

        /**
         * @return void
         */
        public function __construct()
        {
            $this->user = new User();
        }

        /**
         * @return void
         */
        public function insertAction(): void
        {
            $this
                ->getRecordedUser()
                ->insert();

            header('Location: /');
        }

        /**
         * @return string
         */
        protected function layout(): string
        {
            $user = $this->getUser();
            $id = $this->getId();

            $user = $user->findOne((string) $id);

            return $this->getForm($user);
        }

        /**
         * @param array $user
         * @return string
         */

        private function getForm(array $user): string
        {
            return $this->template('Templates/UserLayout/EditForm.php', ['user' => $user]);
        }

        /**
         * @return User
         */
        private function getRecordedUser(): User
        {
            return $this
                ->getUser()
                ->setName($_POST['name'])
                ->setEmail($_POST['email'])
                ->setPassword($_POST['password']);
        }

        /**
         * @return void
         */
        public function update(): void
        {
            $this
                ->getRecordedUser()
                ->setId((int) $_POST['id'])
                ->update();
        }

        /**
         * @return void
         */

        public function insert(): void
        {
            $this
                ->getRecordedUser()
                ->insert();
        }

        public function delete(): void
        {
            $id = $this->getId();

            $this
                ->getUser()
                ->delete($id);
        }
        /**
         * @return User
         */
        private function getUser(): User
        {
            return $this->user;
        }

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * @param int $id
         * @return self
         */
        public function setId($id): self
        {
            $this->id = $id;

            return $this;
        }
    }
