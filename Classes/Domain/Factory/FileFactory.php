<?php
declare(strict_types=1);
namespace Clickstorm\CsPowermailGdpr\Domain\Factory;


use In2code\Powermail\Domain\Model\Answer;
use In2code\Powermail\Domain\Model\File;

/**
 * Class FileFactory
 */
class FileFactory extends \In2code\Powermail\Domain\Factory\FileFactory
{


    /**
     * formRepository
     *
     * @var \In2code\Powermail\Domain\Repository\FormRepository
     * @inject
     */
    protected $formRepository;

    /**
     * Get instance of File from existing answer
     *
     * @param string $fileName
     * @param Answer $answer
     * @return File|null
     */
    public function getInstanceFromExistingAnswerValue($fileName, Answer $answer)
    {
        $form = $answer->getField()->getPages()->getForms();
        $marker = $answer->getField()->getMarker();

        $form = $this->formRepository->findByUid($form->getUid());

        return $this->makeFileInstance($marker, $fileName, null, null, null, true, $form);
    }

}
