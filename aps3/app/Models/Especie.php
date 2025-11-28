namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $fillable = ['nome','descricao'];

    public function animais()
    {
        return $this->hasMany(Animal::class);
    }
}