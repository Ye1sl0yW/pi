<?php


namespace UserBundle\Entity;


use FOS\MessageBundle\Model\ParticipantInterface;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Nexmo\Client;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser implements ParticipantInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string",length=255)
     */

    private $prenom;
    /**
     * @ORM\Column(type="string",length=255)
     */

    private $number;

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }



    public function smsAction($message){

        $client=new Client(new Client\Credentials\Basic("testPUB","testPRIV"),['base_api_url'=>'localhost/PIDEV2_g/web/app_dev.php/sms/view']);
        $client->message()->send([
            'to' => $this->number,
            'from' => 'testserver',
            'text' => $message
        ]);

    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}