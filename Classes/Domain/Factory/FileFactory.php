<?php
declare(strict_types=1);
namespace Clickstorm\CsPowermailGdpr\Domain\Factory;


use In2code\Powermail\Domain\Model\Answer;
use In2code\Powermail\Domain\Model\File;
use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException;
use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException;
use TYPO3\CMS\Extbase\Object\Exception;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;

/**
 * Class FileFactory
 */
class FileFactory extends \In2code\Powermail\Domain\Factory\FileFactory
{

    /**
     * formRepository
     *
     * @var \In2code\Powermail\Domain\Repository\FormRepository
     */
    protected $formRepository = null;

    /**
     * Inject a formRepository
     *
     * @param \In2code\Powermail\Domain\Repository\FormRepository $formRepository
     */
    public function injectFormRepository(\In2code\Powermail\Domain\Repository\FormRepository $formRepository)
    {
        $this->formRepository = $formRepository;
    }

	/**
	 * Get instance of File from existing answer
	 *
	 * @param string $fileName
	 * @param Answer $answer
	 * @return File
	 * @throws Exception
	 * @throws ExtensionConfigurationExtensionNotConfiguredException
	 * @throws ExtensionConfigurationPathDoesNotExistException
	 * @throws InvalidQueryException
	 */
	public function getInstanceFromExistingAnswerValue(string $fileName, Answer $answer): File
    {
        $form = $answer->getField()->getPage()->getForm();
        $marker = $answer->getField()->getMarker();

        $form = $this->formRepository->findByUid($form->getUid());

        return $this->makeFileInstance($marker, $fileName, 0, '', '', true, $form);
    }

}
